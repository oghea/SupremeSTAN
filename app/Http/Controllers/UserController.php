<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;;
use Illuminate\Support\Facades\Storage;
use SupremeSTAN\Http\Requests;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use SupremeSTAN\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use SupremeSTAN\User;
use SupremeSTAN\UserProfile;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\Role;
//use DB;
use Hash;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }
    public function ChangePassword(){
        $user = Auth::user();
        return view('users.changepass',array('users' => $user));
    }
    public function PostChangePassword(Request $request){
        $this->validate($request, [
            'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }
        $user = Auth::user();
        $user->update($input);
        return redirect()->route('dashboard.user')
            ->with('success','User updated successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('display_name','id');
        $userRole = $user->roles->pluck('id','id')->toArray();

        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();


        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }
//    public function profile(){
//        $user = Auth::user();
//        $id=Auth::user()->id;
//        $checkId=UserProfile::where('user_id','=',$id)->get();
//        if($checkId->isEmpty()){
//            $profile = new UserProfile();
//            $profile->user()->associate($user);
//            $profile->save();
//            return view('profile.index', array('users' => $user) );
//        }else{
//            return view('profile.index', array('users' => $user) );
//        }
//
//    }
//    public function editProfile(){
//        $user = Auth::user();
//        return view('profile.edit',array('users' => $user));
//    }
//    public function updateProfile(Request $request){
//        $user = Auth::user();
//        if($request->hasFile('avatar')){
//            $avatar = $request->file('avatar');
//            if($user->user_profile->avatar == 'default.jpg') {
//                $filename = time() . '.' . $avatar->getClientOriginalExtension();
//                Image::make($avatar)->resize(300, 300)->save(storage_path('app/public/uploads/avatars/' . $filename));
//                $user_profile = $user->user_profile;
//                $user_profile->avatar = $filename;
//                $user_profile->save();
//            }else{
//                $old_img=$user->user_profile->avatar;
//                Storage::delete('/public/uploads/avatars/' . $old_img);
////                File::delete(public_path('/uploads/avatars/'.$old_img));
//                $filename = time() . '.' . $avatar->getClientOriginalExtension();
//                Image::make($avatar)->resize(300, 300)->save(storage_path('app/public/uploads/avatars/' . $filename));
//                $user_profile = $user->user_profile;
//                $user_profile->avatar = $filename;
//                $user_profile->save();
//            }
//        }
//        return view('profile.index', array('user' => $user) );
//    }

    public function notVerified(){

        return view('notVerified');
    }
    public function banned(){

        return view('banned');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
}
