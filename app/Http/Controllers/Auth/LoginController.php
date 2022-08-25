<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request) {
        if(Auth::user()->is_admin==1){
            Auth::logout();
            return redirect('admincp/login');
        }
        Auth::logout();
        return redirect('/');
    }
    public function login(Request $request)
    {   
        $input = $request->all();
        
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (isset($_POST['login_admin'])) {
                if (auth()->user()->is_admin == 1) {
                    return redirect()->route('admin.dashboard');
                }
                else{
                    Auth::logout();
                    return redirect('admincp/login')->with('error','Email hoặc mật khẩu không chính xác');
                }
            }else{
                return redirect('/');
            }
            
        }
        else{
            if (isset($_POST['login_admin'])) {
                return redirect('/admincp/login')->with('error','Email hoặc mật khẩu không chính xác');
            } else {
                return redirect()->route('login');
            }
            
        }
          
    }
}
