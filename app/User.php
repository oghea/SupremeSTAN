<?php

namespace SupremeSTAN;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Zizaco\Entrust\Traits\EntrustUserTrait;
use Laratrust\Traits\LaratrustUserTrait;
use Jrean\UserVerification\Traits\UserVerification;



class User extends Authenticatable
{
    use Notifiable,LaratrustUserTrait,UserVerification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function user_profile(){
        return $this->hasOne('SupremeSTAN\UserProfile');
    }
//    public function hasAnyRole(){
//        foreach ($this->roles()->name() as $role){
//            $this->hasRole($role);
//        }
//        return $this;
//    }
    public function isBanned(){
        return (bool) $this->banned;
    }
}
