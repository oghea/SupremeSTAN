<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if(Auth::user()->isVerified() && (Auth::user()->hasRole('owner') || Auth::user()->hasRole('superadmin')
//            || Auth::user()->hasRole('curriculum') || Auth::user()->hasRole('finance') || Auth::user()->hasRole('siswa'))
//            || Auth::user()->hasRole('siswa_tryout') || Auth::user()->hasRole('banned') || Auth::user()->hasRole('admin_account')
//            || Auth::user()->hasRole('admin_content')
//        ){
//            return view('home');
//        }else{
//            return view('welcome');
//        }
        if(Auth::user()->isVerified()) {
            if (Auth::user()->hasRole(['owner', 'superadmin', 'curriculum', 'finance', 'siswa', 'siswa_tryout', 'banned',
                'admin_account', 'admin_content' , 'free_member']))
            {
                return view('home');
            } else {
                Auth::user()->attachRole('10');
                return view('home');
            }
        }else{
            return view('home');
        }
//        Auth::User();
//        if(){
//
//        }

    }
}
