<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $new_order = Order::orderBy('id','DESC')->where('status','Đang chờ xử lý')->get();
        $ngay = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $thang = Carbon::now('Asia/Ho_Chi_Minh')->format('m/Y');
        $doanhso_ngay = Order::where('ngaytao', $ngay)->get()->sum('total');
        $doanhso_thang = Order::where('thang', $thang)->get()->sum('total');
        return view('admin.index', compact('new_order','doanhso_ngay','ngay','thang','doanhso_thang'));
    }
    public function login()
    {
        if(Auth::check()){
            return redirect('/admincp');
        }
        return view('admin.login');
    }
}
