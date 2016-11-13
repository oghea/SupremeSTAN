<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class ResultUSM extends Model
{
    protected $table = 'resultUSM';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'tryoutUSM_id',
        'nilai',
        'resultTPA',
        'resultTBI',
        'skorTPA',
        'skorTBI',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo('SupremeSTAN\User','user_id');
    }

    public function tryoutUsm()
    {
        return $this->belongsTo('SupremeSTAN\TryoutUSM','tryoutUSM_id');
    }
}
