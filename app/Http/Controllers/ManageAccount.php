<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\User;
use SupremeSTAN\Role;
use SupremeSTAN\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;
use SupremeSTAN\UserProfile;

class ManageAccount extends Controller
{
    public function index(Request $request){
        $users = Auth::user();
        $user_list = User::where('verified','=',1)->orderBy('id','DESC')->paginate(10);
        return view('accounts.index',compact('user_list','users'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    public function download(Request $request){
        $data = User::select( 'users.id','name','email','first_name','last_name','quote','birth_date','gender','phone','parent_name','parent_phone','line_id','address','state','city','school_origin' )
            ->join('user_profile','users.id','=','user_profile.user_id')
            ->join('role_user','users.id','=','role_user.user_id')
            ->where('role_user.role_id','=',$request->input('role'))
            ->get()->toArray();
        return Excel::create('SupremeSTAN_User', function($excel) use ($data) {
            $excel->sheet('user', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }
    public function show($id){
        $users = Auth::user();
        $user_profile = User::find($id);
        return view('accounts.show',compact('users','user_profile'));
    }
    public function banned($id){
        $user = User::findOrFail($id);
        $user->banned = 1;
        $user->save();
        return redirect()->route('account.list');
    }
    public function unBanned($id){
        $user = User::findOrFail($id);
        $user->banned = 0;
        $user->save();
        return redirect()->route('account.list');
    }
    public function delete($id){
        $user = User::findOrFail($id);
        $user_profile = UserProfile::where('user_id','=',$id)->first();
        $user_profile->delete();
        $user->delete();
        return redirect()->route('account.list');
    }
}
