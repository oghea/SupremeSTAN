<?php

namespace SupremeSTAN\Http\Controllers\Auth;

use SupremeSTAN\User;
use Validator;
use SupremeSTAN\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
//use SupremeSTAN\User;
//use Validator;
//use SupremeSTAN\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\RegistersUsers;
//use Illuminate\Http\Request;
////
////use Illuminate\Http\Request;
////use SupremeSTAN\User;
////use Validator;
////use SupremeSTAN\Http\Controllers\Controller;
////use Illuminate\Foundation\Auth\RegistersUsers;
//use Jrean\UserVerification\Traits\VerifiesUsers;
//use Jrean\UserVerification\Facades\UserVerification;
////use Jrean\UserVerification;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use VerifiesUsers;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError']]);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        $this->guard()->login($user);

        UserVerification::generate($user);
        UserVerification::send($user, 'please verif');

//        UserVerification::generate($user);
//        UserVerification::send($user, 'Please verify');

        return redirect($this->redirectPath());
    }
}