<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class KdTKD extends Model
{
    protected $table = 'kdTKD';
    public $timestamps = true;
    protected $fillable = [
        'nama',
        'jumlah_soal'
    ];
    protected $guarded = ["id"];

    public function bankSoalTkd()
    {
        return $this->hasOne('SupremeSTAN\BankSoalTKD');
    }
    public function tryoutTKD(){
        return $this->belongsToMany('SupremeSTAN\TryoutTKD','kdTKD_tryoutTKD','kdTKD_id','tryoutTKD_id');
    }
}
