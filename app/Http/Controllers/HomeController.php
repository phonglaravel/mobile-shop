<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        return view('admin.index', compact('new_order'));
    }
    public function login()
    {
        if(Auth::check()){
            return redirect('/admincp');
        }
        return view('admin.login');
    }
}
