<?php

namespace SupremeSTAN\Http\Controllers\Auth;

use SupremeSTAN\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    protected function authenticated($user)
    {
        if(Auth::user()->isVerified()){
            if(Auth::user()->isBanned()){
                $this->redirectTo = '/banned';
            }else{
                if (Auth::user()->hasRole(['owner', 'superadmin', 'curriculum', 'finance', 'admin_account', 'admin_content'])) {
                    $this->redirectTo = 'admin/home';
                }else if(Auth::user()->hasRole(['bimbel_premium', 'bimbel_online', 'siswa_tryout', 'free_member'])) {
                    $this->redirectTo = 'home';
                }else{
                    Auth::user()->attachRole('10');
                    $this->redirectTo = 'home';
                }
            }
        }else{
            $this->redirectTo = '/verf';
        }
    }
//    public function logout(Request $request)
//    {
//        $this->guard()->logout();
//
//        $request->session()->flush();
//
//        $request->session()->regenerate();
//
//        return redirect()->route('/');
//    }
}
