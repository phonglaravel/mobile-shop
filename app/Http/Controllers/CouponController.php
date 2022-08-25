<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('admin.coupon.list',  compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request)
    {
        $coupon = new Coupon();
        $coupon->title = $request->title;
        $coupon->amount = $request->amount;
        $coupon->price = $request->price;
        $coupon->condition = $request->condition;
        $coupon->day_start = $request->day_start;
        $coupon->day_end = $request->day_end;
        $coupon->status = $request->status;
        $coupon->save();
        return  redirect()->route('coupon.index')->with('success','Thêm thành công');
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
    public function edit(Coupon $coupon)
    {
       
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        
        $coupon->title = $request->title;
        $coupon->amount = $request->amount;
        $coupon->price = $request->price;
        $coupon->condition = $request->condition;
        $coupon->day_start = $request->day_start;
        $coupon->day_end = $request->day_end;
        $coupon->status = $request->status;
        $coupon->save();
        return  redirect()->route('coupon.index')->with('success','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect('admincp/coupon')->with('success','Xóa thành công');
    }
}
