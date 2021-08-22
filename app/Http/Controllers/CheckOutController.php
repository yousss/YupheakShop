<?php

namespace App\Http\Controllers;

use App\Country;
use App\DeliveryAddress;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $user_login = User::where('id', Auth::id())->first();
        $shippingaddress = DeliveryAddress::where('users_id', Auth::id())->first();
        if ($shippingaddress) {
            return redirect('/order-review');
        }
        return view('checkout.index', compact('countries', 'user_login', 'shippingaddress'));
    }
    public function submitcheckout(Request $request)
    {
        $this->validate($request, [
            'billing_name' => 'required',
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billing_state' => 'required',
            'billing_pincode' => 'required',
            'billing_mobile' => 'required',
            'shipping_name' => 'required',
            'shipping_address' => 'required',
            'shipping_city' => 'required',
            'shipping_state' => 'required',
            'shipping_pincode' => 'required',
            'shipping_mobile' => 'required',
        ]);
        $input_data = $request->all();
        DB::beginTransaction();
        try {
            $shippingaddress = DeliveryAddress::where('users_id', Auth::id())->first();
            if (!$shippingaddress) {
                $shippingaddress = new DeliveryAddress;
            }

            $shippingaddress->name = $input_data['shipping_name'];
            $shippingaddress->address = $input_data['shipping_address'];
            $shippingaddress->city = $input_data['shipping_city'];
            $shippingaddress->state = $input_data['shipping_state'];
            $shippingaddress->country = $input_data['shipping_country'];
            $shippingaddress->pincode = $input_data['shipping_pincode'];
            $shippingaddress->mobile = $input_data['shipping_mobile'];

            $shippingaddress->users_id = Auth::id();
            $shippingaddress->users_email = Session::get('frontSession');


            User::where('id', Auth::id())->update([
                'name' => $input_data['billing_name'],
                'address' => $input_data['billing_address'],
                'city' => $input_data['billing_city'],
                'state' => $input_data['billing_state'],
                'country' => $input_data['billing_country'],
                'pincode' => $input_data['billing_pincode'],
                'mobile' => $input_data['billing_mobile']
            ]);

            $shippingaddress->save();
            DB::commit();
            return redirect('/order-review');
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
            throw $e;
        }
    }
}
