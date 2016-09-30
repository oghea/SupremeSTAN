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
        'quote',
        'birth_date',
        'gender',
        'phone',
        'parent_name',
        'parent_phone',
        'line_id',
        'address',
        'state',
        'city',
        'zip',
        'school_origin',
        'avatar'
    ];

    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo('SupremeSTAN\User','user_id');
    }
}
