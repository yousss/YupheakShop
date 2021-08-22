<?php

namespace App\Http\Controllers;

use App\DeliveryAddress;
use App\Events\StockAddBackEvent;
use App\Events\StockCuttOffEvent;
use App\Http\Requests\InvoiceCreateRequest;
use App\Http\Requests\OrderedItemRequest;
use App\Invoice;
use App\OrderedItemDetail;
use App\Orders_model;
use App\ProductAtrr_model;
use App\Products_model;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDF;

class InvoiceController extends Controller
{
    protected  $menu_active;
    public function __construct()
    {
        $this->menu_active = 5;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('customer')->get();
        return view('backEnd.invoices.index', ['menu_active' => $this->menu_active, 'invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users =  User::where('is_active', 1)->get();
        $items = Products_model::with(['category', 'productAttributes'])->paginate(4);
        $newlyAddedItems = OrderedItemDetail::where('status', 'admin_added')->where('add_by', Auth::id())->get();
        $invoiceCode = mt_rand(1000000000, 9999999999);

        return view(
            'backEnd.invoices.create',
            [
                'menu_active' => $this->menu_active,
                'invoiceCode' => $invoiceCode,
                'is_paid' => 'OUTSTANDING',
                'shippingAddresses' => [],
                'users' => $users,
                'items' => $items,
                "newlyAddedItems" => $newlyAddedItems
            ]
        );
    }

    public function getShippingAddresses(Request $request)
    {
        $userId = $request->get('users_id');
        if ($userId) {
            $shippingAddresses = DeliveryAddress::where('users_id', $userId)->get();
            return response()->json(['shippingAddresses' => $shippingAddresses], 200);
        }
        return response()->json(null, 200);
    }

    public function addOrderedItem(OrderedItemRequest $request)
    {
        $quantity = $request->quantity;
        $productAttributeId = $request->product_attribute_id;
        $all = $request->only([
            'product_attribute_id',
            'product_color',
            'product_name',
            'product_color',
            'product_code',
            'size',
            'price',
            'quantity',
            'condition',
            'products_id'
        ]);
        try {
            DB::beginTransaction();
            $itemExist = ProductAtrr_model::where('id', $productAttributeId)->where('stock', '>=', $quantity)->first();

            if ($itemExist) {
                event(new StockCuttOffEvent($quantity, [$productAttributeId]));
            } else {
                $notifications = [
                    'message' => 'Item is out of stock.',
                    'alert-type' => 'info'
                ];
                return back()->with($notifications);
            }

            $all = array_merge(
                $all,
                [
                    'orders_id' => null,
                    'status' => 'admin_added',
                    'add_by' => Auth::id()
                ]
            );

            OrderedItemDetail::create($all);
            $goTo = route('invoices.create');
            $notifications = [
                'message' => 'Item has been addted to invoice',
                'alert-type' => 'info'
            ];
            return redirect($goTo)->with($notifications);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceCreateRequest $request)
    {
        if (!$request->itemIds || !$request->total_qty) {
            $notifications = [
                'message' => 'Please select item to be adding in to invoice',
                'alert-type' => 'info'
            ];
            return back()->with($notifications);
        }
        $discount = $request->discount_amount;
        $shipping_fee = $request->shipping_charges;
        $coupon_amount = $request->coupon_amount;
        $tax_rate = $request->tax_rate;
        $amount = $request->amount;
        $total_qty = $request->total_qty;
        $itemIds =  explode(',', $request->itemIds);
        $newAmount = $amount  + $shipping_fee;

        $subTotal = ($newAmount * $discount) / 100;
        $subTotal = $newAmount - $subTotal;
        $subTotal = ($subTotal - $coupon_amount);
        $taxedAmount = ($subTotal * $tax_rate) / 100;
        $subTotal = number_format($subTotal + $taxedAmount, 2);
        $code = $request->code;
        $note = $request->note;
        $paid_by = $request->paid_by;
        $is_paid =  0;
        $customer_id = $request->customer_id;

        $newParams = [
            'users_id' => $request->customer_id,
            'users_email' => $request->users_email,
            'shipping_address_id' => $request->shipping_address,
            'shipping_charges' => $request->shipping_charges,
            'coupon_code' => $request->coupon_code,
            'coupon_amount' => $request->coupon_amount,
            'order_status' => "success",
            'payment_method' => $request->paid_by,
            'total_qty' =>  $total_qty,
            'grand_total' => $subTotal
        ];

        $invoices = [
            'code' => $code,
            'customer_id' => $customer_id,
            'created_by' => Auth::id(),
            'created_on' => now(),
            'discount_amount' => number_format(($discount * $amount) / 100, 2),
            'amount' => $subTotal,
            'tax_rate' => $tax_rate,
            'paid_by' => $paid_by,
            'discount_rate' => $discount,
            'is_paid' => $is_paid,
            'note' => $note,
            'total_qty' =>  $total_qty,
            'cost' => $amount
        ];
        $notifications = [
            'message' => 'Invoice has been created',
            'alert-type' => 'info'
        ];
        try {
            DB::beginTransaction();
            $order = Orders_model::create($newParams);

            if ($order) {
                foreach ($itemIds as $key => $itemId) {
                    OrderedItemDetail::where('id', $itemId)->update(['orders_id' => $order->id, 'status' => 'invoiced']);
                }
                Invoice::create(array_merge($invoices, ['order_id' =>  $order->id]));
            }
            DB::commit();
            return redirect(route('invoices.index'))->with($notifications);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            DB::beginTransaction();
            $invoice = Invoice::find($id);
            $items = $invoice->order()->with(['orderedItemsDetail'])->get();
            DB::commit();
            return response()->json(['qty' => $invoice->total_qty, 'items' => $items], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }
    public function updatingItem(Request $request, $id, $itemId, $orderId)
    {
        $qty = $request->qty ?? 0;
        $sign = $request->sign;

        try {
            DB::beginTransaction();
            $orderDetail = OrderedItemDetail::find($itemId);
            $stockCounted = $orderDetail->productAttribute->stock;

            if ($sign === '2' && $orderDetail->quantity > 0) {
                $orderDetail->quantity = $orderDetail->quantity - $qty;
            } else if ($sign === '1' && $orderDetail->quantity >= 0) {
                $orderDetail->quantity = $orderDetail->quantity + $qty;
            }

            if (empty($stockCounted) ||  $stockCounted === 0 || $stockCounted < $orderDetail->quantity) {
                DB::rollBack();
                return  response()->json(['success' => false, "message" => "The ordered item amount is not enough"]);
            }
            $orderDetail->save();
            DB::commit();

            DB::beginTransaction();
            $invoice = Invoice::find($id);
            $order = Orders_model::with(['orderedItemsDetail'])->find($orderId);
            $orderedItems = OrderedItemDetail::where('orders_id', $orderId)->get();

            $totalQty = 0;
            $totalAmount = 0;

            if ($orderedItems) {
                foreach ($orderedItems as $orderedItem) {
                    $totalQty += $orderedItem->quantity;
                    $totalAmount += ($orderDetail->price * $orderedItem->quantity);
                }
            }
            $invoice->total_qty =  $totalQty;
            $amount = $totalAmount + $order->shipping_charges - $order->coupon_amount;

            $discount = ($amount * $invoice->discount_rate) / 100;
            $subTotal = $amount - $discount;

            $tax_rate = $invoice->tax_rate;
            $taxedAmount = ($subTotal * $tax_rate) / 100;

            $subTotal = number_format($subTotal + $taxedAmount, 2);
            $invoice->amount = $subTotal;
            $invoice->discount_amount = $discount;
            $invoice->adjusted_by = Auth::id();
            $order->total_qty = $totalQty;
            $order->grand_total = $subTotal;

            $order->save();
            $invoice->save();
            if ($invoice) {
                return response()->json(['success' => true]);
            }
            DB::commit();

            return response()->json(['message' => 'Something went wrong'], 500);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function removeItemFromInvoice($itemId, $productAttributeId, $amountStock)
    {
        $notification = [
            'message' => 'Item has been removed from invoice',
            'alert-type' => 'info'
        ];
        try {
            $item = OrderedItemDetail::find($itemId);
            $item->delete();
            event(new StockAddBackEvent($productAttributeId, $amountStock));
            return redirect(route('invoices.create'))->with($notification);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function showOrderedItems($orderedItemsId)
    {
        $orderedItems = Orders_model::with(['orderedItemsDetail', 'shippingAddress', 'invoice'])->find($orderedItemsId);
        return view(
            'backEnd.invoices.ordered-items-detail',
            [
                'menu_active' => $this->menu_active,
                'orderedItems' => $orderedItems
            ]
        );
    }

    public function pay($invoiceId)
    {
        try {
            DB::beginTransaction();
            Invoice::where('id', $invoiceId)->update([
                'paid_at' => now(),
                'verified_by' => Auth::id(),
                'approved_by' => Auth::id(),
                'issuing_on' => now(),
                'is_paid' => 1,
                'paid_at' => now(),
            ]);
            $notification = [
                'message' => 'Invoice has been paid.',
                'alert-type' => 'info'
            ];
            DB::commit();
            return redirect(route('invoices.index'))->with($notification);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    public function print($orderedItemsId)
    {
        $orderedItems = Orders_model::with(['orderedItemsDetail', 'shippingAddress', 'invoice'])->find($orderedItemsId);
        $pdf = PDF::loadView(
            'backEnd.invoices.invoice-print',
            [
                'orderedItems' => $orderedItems,
                'menu_active' => $this->menu_active,
            ]
        );
        return $pdf->download('invoice.pdf');
    }
}
