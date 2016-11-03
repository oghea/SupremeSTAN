<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class JawabanTKD extends Model
{
    protected $table = 'jawabanTKD';
    protected $fillable = [
        'tryoutTKD_id',
        'user_id',
        'jawaban',
    ];

    public function tryoutTkd()
    {
        return $this->belongsTo('SupremeSTAN\TryoutTKD');
    }

    public function user()
    {
        return $this->belongsTo('SupremeSTAN\User');
    }
}
