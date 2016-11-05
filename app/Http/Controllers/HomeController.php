<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\User;
use SupremeSTAN\Role;
use SupremeSTAN\UserProfile;
use JavaScript;

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
        if(Auth::user()->isVerified()) {
            $users=Auth::user();
            $id=Auth::user()->id;
            $checkId=UserProfile::where('user_id','=',$id)->get();
            JavaScript::put([
                'usm' => $users->TO_USM,
                'tkd' => $users->TO_TKD,
                'quiz' => $users->TO_harian
            ]);
            if (Auth::user()->hasRole(['bimbel_premium','bimbel_online', 'siswa_tryout', 'banned', 'free_member']))
            {
                if($checkId->isEmpty()){
                    $profile = new UserProfile();
                    $profile->user()->associate($users);
                    $profile->save();
                }
//                $user->roles->get();
                return view('dashboard.user',compact('users'));
            } else {
                Auth::user()->attachRole('10');
                if($checkId->isEmpty()){
                    $profile = new UserProfile();
                    $profile->user()->associate($users);
                    $profile->save();
                }
//                $user->roles->get();
                return view('dashboard.user',compact('users'));
            }
        }else{
//            return view('dashboard.user',compact('users'));
            return redirect()->route('logout');
        }
    }
}
