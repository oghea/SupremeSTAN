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
        'result_TPA',
        'result_TBI',
        'skor_tpa',
        'skor_tbi',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo('SupremeSTAN\User');
    }

    public function tryoutUsm()
    {
        return $this->belongsTo('SupremeSTAN\TryoutUSM');
    }
}
