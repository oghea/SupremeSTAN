<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class JawabanUSM extends Model
{
    protected $table = 'jawabanUSM';
    protected $fillable = [
        'tryoutUSM_id',
        'user_id',
        'jawaban_tpa',
        'jawaban_tbi',
        'urutanTPA',
        'urutanTBI'
    ];

    public function tryoutUsm()
    {
        return $this->belongsTo('SupremeSTAN\TryoutUSM','tryoutUSM_id');
    }

    public function user()
    {
        return $this->belongsTo('SupremeSTAN\User','user_id');
    }
}
