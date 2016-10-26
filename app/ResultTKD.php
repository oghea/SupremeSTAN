<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class ResultTKD extends Model
{
    protected $table = 'resultTKD';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'tryoutTKD_id',
        'result',
        'nilai',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo('SupremeSTAN\User');
    }

    public function tryoutTkd()
    {
        return $this->belongsTo('SupremeSTAN\TryoutTKD');
    }
}
