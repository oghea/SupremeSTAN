<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class JawabanUSM extends Model
{
    protected $table = 'jawabanUSM';
    public $timestamps = true;
    protected $fillable = [
        'tryoutUSM_id',
        'user_id',
        'jawaban_tpa',
        'jawaban_tbi'
    ];

    public function tryoutUsm()
    {
        return $this->belongsTo('TryoutUSM');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
