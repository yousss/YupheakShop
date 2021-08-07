<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\ProductAtrr_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $session_id = Session::get('session_id');
        $cart_datas = Cart_model::with('product')->where('session_id', $session_id)->get();
        $total_price = 0;
        foreach ($cart_datas as $cart_data) {
            $total_price += $cart_data->price * $cart_data->quantity;
        }
        return view('frontEnd.cart', compact('cart_datas', 'total_price'));
    }

    public function addToCart(Request $request)
    {
        $inputToCart = $request->all();

        Session::forget('discount_amount_price');
        Session::put('discount_amount_price');
        Session::forget('coupon_code');
        if ($inputToCart['size'] == "") {
            $notification = array(
                'message' => 'Please select size.',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        if (empty($inputToCart['quantity']) || $inputToCart['quantity'] === 0) {
            $notification = [
                'message' => 'Please input quantity.',
                'alert-type' => 'error'
            ];
            return  back()->with($notification);
        }

        $stockAvailable = ProductAtrr_model::select('stock', 'sku', 'id')
            ->where('products_id', $inputToCart['products_id'])
            ->where('price', $inputToCart['price'])
            ->where('stock', '>=', $inputToCart['quantity'])
            ->first();

        $inputQty = $inputToCart['quantity'];

        if (!$stockAvailable  || empty($stockAvailable)) {
            $notification = [
                'message' => "Amount of $inputQty is not Available!",
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }

        $inputToCart['user_email'] = 'weshare@gmail.com';
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = str_random(40);
            Session::put('session_id', $session_id);
        }
        $inputToCart['session_id'] = $session_id;
        $sizeAtrr = explode("-", $inputToCart['size']);
        $inputToCart['size'] = $sizeAtrr[1];
        $inputToCart['product_code'] = $stockAvailable->sku;
        $inputToCart['product_attribute_id'] = $stockAvailable->id;

        $count_duplicateItems = Cart_model::where([
            'products_id' => $inputToCart['products_id'],
            'product_color' => $inputToCart['product_color'],
            'size' => $inputToCart['size']
        ])->count();

        if ($count_duplicateItems > 0) {
            $notification = [
                'message' => "The Item already added",
                'alert-type' => 'info'
            ];
            return back()->with($notification);
        }

        $notification = [
            'message' => "Item has been successfully added to your cart",
            'alert-type' => 'info'
        ];
        Cart_model::create($inputToCart);

        return redirect(route('shop'))->with($notification);
    }
    public function deleteItem($id = null)
    {
        $notification = [
            'message' => "Item has been successfully deleted from your cart",
            'alert-type' => 'info'
        ];
        $delete_item = Cart_model::findOrFail($id);
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $delete_item->delete();
        return back()->with($notification);
    }
    public function updateQuantity($id, $quantity)
    {
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $sku_size = Cart_model::select('product_code', 'size', 'quantity')->where('id', $id)->first();

        $stockAvailable = ProductAtrr_model::select('stock')->where([
            'sku' => $sku_size->product_code,
            'size' => $sku_size->size
        ])->first();

        $updated_quantity = $sku_size->quantity + $quantity;
        if (is_numeric($stockAvailable->stock) && is_numeric($updated_quantity) && ($stockAvailable->stock <  $updated_quantity)) {
            $notification = [
                'message' => "Amount ordered item is not available",
                'alert-type' => 'info'
            ];
            return back()->with($notification);
        }

        $notification = [
            'message' => "Amount ordered item has been updated.",
            'alert-type' => 'info'
        ];
        Cart_model::where('id', $id)->increment('quantity', $quantity);

        return back()->with($notification);
    }
}
