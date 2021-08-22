<?php

namespace App\Http\Controllers;

use App\Coupon_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active = 4;
        $coupons = Coupon_model::all();
        return view('backEnd.coupon.index', compact('menu_active', 'coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active = 4;
        return view('backEnd.coupon.create', compact('menu_active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notification = [
            'message' => "Coupon has been added.",
            'alert-type' => 'info'
        ];

        $this->validate($request, [
            'coupon_code' => 'required|min:5|max:15|unique:coupons,coupon_code',
            'amount' => 'required|numeric|between:1,99',
            'expiry_date' => 'required|date'
        ]);
        $input_data = $request->all();
        if (empty($input_data['status'])) {
            $input_data['status'] = 0;
        } else {
            $input_data['status'] = 1;
        }
        Coupon_model::create($input_data);
        return back()->with($notification);
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
        $menu_active = 4;
        $edit_coupons = Coupon_model::findOrFail($id);
        return view('backEnd.coupon.edit', compact('menu_active', 'edit_coupons'));
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
        $update_coupon = Coupon_model::findOrFail($id);
        $this->validate($request, [
            'coupon_code' => 'required|min:5|max:15|unique:coupons,coupon_code,' . $update_coupon->id,
            'amount' => 'required|numeric|between:1,99',
            'expiry_date' => 'required|date'
        ]);
        $input_data = $request->all();
        if (empty($input_data['status'])) {
            $input_data['status'] = 0;
        } else {
            $input_data['status'] = 1;
        }
        $update_coupon->update($input_data);
        return redirect()->route('coupon.index')->with('message', 'Edit Coupon Already!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_coupon = Coupon_model::findOrFail($id);
        $delete_coupon->delete();
        return back()->with('message', 'Delete Coupon Already!');
    }
    public function applycoupon(Request $request)
    {
        $this->validate($request, [
            'coupon_code' => 'required'
        ]);

        $notification = [
            'message' => "Your Coupon has already been used",
            'alert-type' => 'info'
        ];

        $input_data = $request->all();
        $coupon_code = $input_data['coupon_code'];
        $total_amount_price = $input_data['Total_amountPrice'];
        $check_coupon = Coupon_model::select('coupon_code', 'status', 'expiry_date', 'amount')->where('coupon_code', $coupon_code)->first();

        if (!$check_coupon) {
            $notification = [
                'message' => "Your Coupon Code Not Exist!",
                'alert-type' => 'info'
            ];

            return back()->with($notification);
        }

        if ($check_coupon->status == 0) {
            $notification = [
                'message' => "Your Coupon was Disabled!",
                'alert-type' => 'info'
            ];
            return back()->with($notification);
        }

        $expiried_date = $check_coupon->expiry_date;
        $date_now = date('Y-m-d');
        if ($expiried_date < $date_now) {
            $notification = [
                'message' => "Your Coupon was Expired!",
                'alert-type' => 'info'
            ];
            return back()->with($notification);
        } else {
            $discount_amount_price = ($total_amount_price * $check_coupon->amount) / 100;
            Session::put('discount_amount_price', $discount_amount_price);
            Session::put('coupon_code', $check_coupon->coupon_code);
            return back()->with($notification);
        }
    }
}
