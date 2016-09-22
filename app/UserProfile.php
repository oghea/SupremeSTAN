<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = "user_profile";

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'vat',
        'state',
        'city',
        'country',
        'zip',
        'code',
        'address',
        'avatar'
    ];

    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo('SupremeSTAN\User','user_id');
    }
}
