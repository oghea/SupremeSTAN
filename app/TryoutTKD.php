<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class TryoutTKD extends Model
{
    protected $table = 'tryoutTKD';
    protected $fillable = [
        'publishdate',
        'published'
    ];

    public function bankSoalTkd()
    {
        return $this->belongsToMany('BankSoalTKD');
    }

    public function jawabanTkd()
    {
        return $this->hasOne('JawabanTKD');
    }

    public function resultTkd()
    {
        return $this->hasOne('ResultTKD');
    }
}
