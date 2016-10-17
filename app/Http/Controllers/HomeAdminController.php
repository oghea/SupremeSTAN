<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;

use SupremeSTAN\Http\Requests;

class HomeAdminController extends Controller
{
    public function index(){
        return view('dashboard.user',compact('users'));
    }
}
