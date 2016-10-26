<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use SupremeSTAN\User;
use SupremeSTAN\Role;

use SupremeSTAN\Http\Requests;


class HomeAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:owner|superadmin|curriculum|finance|admin_account|admin_content');
    }
    public function index(){
        $auth=Auth::user();
        if (Auth::user()->hasRole(['owner', 'superadmin', 'curriculum', 'finance',
            'admin_account', 'admin_content']))
        {
            $users=$auth;
//                $user->roles->get();
            return view('dashboard.admin',compact('users'));
        }
    }
}
