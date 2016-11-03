<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\User;
use SupremeSTAN\Role;
use SupremeSTAN\Http\Requests;

class ManageAccount extends Controller
{
    public function index(Request $request){
        $users = Auth::user();
        $user_list = User::orderBy('id','DESC')->paginate(10);
        return view('accounts.index',compact('user_list','users'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
//    public function show($id){
//        $users = Auth::user();
//        $user_profile = User::find($id);
//        return view('account.show',compact('users','user_profile'));
//
//    }
}
