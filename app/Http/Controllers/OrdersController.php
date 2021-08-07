<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\DeliveryAddress;
use App\Events\DeleteItemFromCartEvent;
use App\Events\InvoiceCreatedEvent;
use App\Events\InvoicePaidEvent;
use App\Events\StockCuttOffEvent;
use App\Mail\SendMail;
use App\OrderedItemDetail;
use App\Orders_model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use NumberFormatter;

class OrdersController extends Controller
{

    protected $amount;
    protected $invoiceCode;
    protected $customer;
    protected $customerPhone;
    protected $cusomterEmail;
    protected $itemName = '';
    protected $paidAt;
    protected $paidBy;

    public function __construct()
    {
        $this->amount = 0;
        $this->invoiceCode = '';
        $this->customer = '';
        $this->customerPhone = '';
        $this->cusomterEmail = '';
        $this->itemName = '';
        $this->paidAt = now();
        $this->paidBy = 'COD';
    }

    public function index()
    {
        $session_id = Session::get('session_id');
        $cart_datas = Cart_model::where('session_id', $session_id)->get();
        $total_price = 0;
        foreach ($cart_datas as $cart_data) {
            $total_price += $cart_data->price * $cart_data->quantity;
        }
        $shipping_address = DeliveryAddress::where('users_id', Auth::id())->first();
        return view('checkout.review_order', compact('shipping_address', 'cart_datas', 'total_price'));
    }
    public function order(Request $request)
    {
        $input_data = $request->all();
        $payment_method = $input_data['payment_method'];
        $qtys = $input_data['qty'];
        $productAttributeIds = $input_data['product_attribute_id'];
        $cartIds = $input_data['cart_id'];
        $input_data['total_qty'] = array_sum($qtys);

        if (empty($cartIds) && count($cartIds) === 0) {
            $notification = [
                'message' => 'Something went wrong. please contact administrator.',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }


        DB::beginTransaction();
        try {
            $order = Orders_model::create($input_data);
            $items = Cart_model::whereIn('id', $cartIds)->get();
            foreach ($items as $item) {
                OrderedItemDetail::create([
                    'orders_id' => $order->id,
                    'products_id' => $item->products_id,
                    'product_name' => $item->product_name,
                    'product_code' => $item->product_code,
                    'product_color' => $item->product_color,
                    'size' => $item->size,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'condition' => $item->product->is_new,
                    'product_attribute_id' => $item->productAttribute->id,
                ]);
                $this->itemName .= $item->product_name . ',';
            }
            $this->itemName =  substr($this->itemName, 0, strlen($this->itemName) - 1);
            event(new StockCuttOffEvent($qtys, $productAttributeIds));
            event(new DeleteItemFromCartEvent($cartIds));
            $this->invoiceCode = mt_rand(1000000000, 9999999999);
            Session::put('invoiceCode', $this->invoiceCode);
            event(new InvoiceCreatedEvent([
                'customer_id' => Auth::id(),
                'code' => $this->invoiceCode,
                'order_id' => $order->id,
                'created_by' => Auth::id(),
                'issuing_on' => now(),
                'discount_amount' => $order->coupon_amount,
                'amount' => $order->grand_total,
                'discount_rate' => (doubleval($order->coupon_amount)),
                'is_paid' => false,
                'total_qty' => $input_data['total_qty'],
                'paid_by' => $order->payment_method,
                'note' => null,
            ]));
            $this->amount = $order->grand_total;
            $this->paidBy = $order->payment_method;
            Session::put('paidBy', $this->paidBy);
            Session::put('amount', $this->amount);
            Session::put('itemName', $this->itemName);
            $notification = [
                'message' => 'Thank you for you order. please come again.',
                'alert-type' => 'success'
            ];

            if ($payment_method === 'Paypal') {
                return redirect(route('paywithpaypal'));
            }

            DB::commit();
            return redirect(route('success', ['type' => 'payment.cod']))->with($notification);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    protected function mailTo()
    {
        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $this->customerPhone = Auth::user()->mobile;
        $this->customerEmail = Auth::user()->email;
        $this->customer = Auth::user()->name;
        $datas = [
            'amount' => Session::get('amount'),
            'invoiceCode' => Session::get('invoiceCode'),
            'paidBy' => Session::get('paidBy'),
            'paidAt' => $this->paidAt,
            'customer' => $this->customer,
            'customerPhone' => $this->customerPhone,
            'customerEmail' => $this->customerEmail,
            'itemName' => Session::get('itemName'),
            'numberInWord' => $f->format(Session::get('amount')),
        ];
        Mail::to($this->customerEmail)->send(new SendMail($datas));
        Session::forget('invoiceCode');
        Session::forget('amount');
        Session::forget('paidBy');
        Session::forget('itemName');
    }

    public function success($type = 'payment.cod')
    {
        $email = Auth::user()->email;
        $mobile = Auth::user()->mobile;
        $this->paidAt = now();
        $this->mailTo();
        return view($type, compact('mobile', 'email'));
    }

    public function payWithPaypal()
    {
        $amount  = Session::get('amount');
        $invoice_code = Session::get('invoiceCode');
        return view('payment.paypal', compact('amount', 'invoice_code'));
    }

    public function payWithPaypalSuccess(Request $request)
    {
        if ($request->get('status') === 'COMPLETED') {
            $this->paidAt = now();
            $notification = [
                'message' => 'Your transaction has been completed. 
                    Thank for shopping with us. Please come again.',
                'alert-type' => 'success'
            ];
            $invoiceCode = Session::get('invoiceCode');
            event(new InvoicePaidEvent(true, $invoiceCode));
            $this->mailTo();
            return redirect(route('shop'))->with($notification);
        }

        return view('payment.failure');
    }

    public function orderHistory()
    {
        $cart_datas = Orders_model::paginate(10);
        dd($cart_datas);
        return view('frontEnd.order-history', compact('cart_datas'));
    }
}
