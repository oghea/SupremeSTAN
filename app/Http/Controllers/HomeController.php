<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\User;
use SupremeSTAN\Role;

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
        $this->middleware('role:free_member|siswa_tryout|bimbel_online|bimbel_premium');
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
            $auth=Auth::user();
            if (Auth::user()->hasRole(['bimbel_premium','bimbel_online', 'siswa_tryout', 'banned', 'free_member']))
            {
                $users=$auth;
//                $user->roles->get();
                return view('dashboard.user',compact('users'));
            } else {
                Auth::user()->attachRole('10');
                $users=$auth;
//                $user->roles->get();
                return view('dashboard.user',compact('users'));
            }
        }else{
            $users=User::find(Auth::user());
            return view('dashboard.user',compact('users'));
        }
//        Auth::User();
//        if(){
//
//        }

    }
}
