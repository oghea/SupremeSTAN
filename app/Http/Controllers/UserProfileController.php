<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SupremeSTAN\Http\Requests;
use SupremeSTAN\User;
use SupremeSTAN\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class UserProfileController extends Controller
{
    public function create(){
        $user = Auth::user();
        $id=Auth::user()->id;
        $checkId=UserProfile::where('user_id','=',$id)->get();
        if($checkId->isEmpty()){
            $profile = new UserProfile();
            $profile->user()->associate($user);
            $profile->save();
            return view('profile.index', array('users' => $user) );
        }else{
            return view('profile.index', array('users' => $user) );
        }
    }
    public function view(){

    }
    public function update(Request $request){
        $user = Auth::user();

        $this->validate($request, [
            'first_name' => 'required',
            'address' => 'required|max:99',
            'birth_date' => 'required|date_format:d/m/Y',
            'phone' => 'required|numeric|digits_between:10,13',
            'gender' => 'required',
            'state' => 'required',
            'city' => 'required',
            'parent_name' => 'required|max:100',
            'parent_phone' => 'required|numeric|digits_between:10,13',
            'avatar' => 'image'
        ]);
        $input = $request->all();
        $user->user_profile->update($input);
        $user->birth_date = $request->birth_date->format('Y/m/d');
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            if($user->user_profile->avatar == 'default.jpg') {
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(storage_path('app/public/uploads/avatars/' . $filename));
                $user_profile = $user->user_profile;
                $user_profile->avatar = $filename;
                $user_profile->save();
            }else{
                $old_img=$user->user_profile->avatar;
                Storage::delete('/public/uploads/avatars/' . $old_img);
//                File::delete(public_path('/uploads/avatars/'.$old_img));
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(storage_path('app/public/uploads/avatars/' . $filename));
                $user_profile = $user->user_profile;
                $user_profile->avatar = $filename;
                $user_profile->save();
            }
        }

        return view('profile.index', array('users' => $user) );
    }
    public function edit(){
        $user = Auth::user();
        $default='';
        $sexF = false;
        $sexM = false;
        if($user->user_profile) {
            $namadepan = $user->user_profile->first_name;
            $namabelakang = $user->user_profile->last_name;
            $alamat = $user->user_profile->address;
            $provinsi = $user->user_profile->state;
            $kota = $user->user_profile->city;
            $ttl = $user->user_profile->birth_date;
            $hp = $user->user_profile->phone;
            $line = $user->user_profile->line_id;
            $ortu = $user->user_profile->parent_name;
            $ortuHp = $user->user_profile->parent_phone;
            $sekolahAsal = $user->user_profile->school_origin;
            $quote = $user->user_profile->quote;
            $gender = $user->user_profile->gender;
            if($gender=='Pria'){
                $sexM = true;
            }else if($gender=='Wanita'){
                $sexF = true;
            }
        }
        else{
            $namadepan = $default;
            $namabelakang = $default;
            $alamat = $default;
            $provinsi = $default;
            $kota = $default;
            $ttl = $default;
            $hp = $default;
            $line = $default;
            $ortu = $default;
            $ortuHp = $default;
            $sekolahAsal = $default;
            $quote = $default;
            $sexM = false;
            $sexF = false;
        }
        return view('profile.edit',array(
            'users' => $user,
            'namadepan' => $namadepan,
            'namabelakang' => $namabelakang,
            'alamat' => $alamat,
            'provinsi' => $provinsi,
            'kota' => $kota,
            'ttl' => $ttl,
            'hp' => $hp,
            'line' => $line,
            'ortu' => $ortu,
            'ortuHp' => $ortuHp,
            'sekolahAsal' => $sekolahAsal,
            'quote' => $quote,
            'sexM' => $sexM,
            'sexF' => $sexF));
    }
}
