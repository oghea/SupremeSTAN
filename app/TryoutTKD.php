<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class TryoutTKD extends Model
{
    protected $table = 'tryoutTKD';
    protected $fillable = [
        'judul',
        'publishdate',
        'published',
        'durasi'
    ];

    public function bankSoalTkd()
    {
        return $this->belongsToMany('SupremeSTAN\BankSoalTKD','banksoalTKD_tryoutTKD','tryoutTKD_id','banksoalTKD_id');
    }
    public function kdTKD(){
        return $this->belongsToMany('SupremeSTAN\KdTKD','kdTKD_tryoutTKD','tryoutTKD_id','kdTKD_id');
    }

    public function jawabanTkd()
    {
        return $this->hasOne('SupremeSTAN\JawabanTKD');
    }

    public function resultTkd()
    {
        return $this->hasOne('SupremeSTAN\ResultTKD');
    }
}
