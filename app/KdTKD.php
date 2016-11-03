<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class KdTKD extends Model
{
    protected $table = 'kdTKD';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'jumlah_soal'
    ];
    protected $guarded = ["id"];

    public function bankSoalTkd()
    {
        return $this->hasOne('SupremeSTAN\BankSoalTKD');
    }
    public function bankSoalTkp(){
        return $this->hasOne('SupremeSTAN\BankSoalTKP');
    }
    public function bundleTkd(){
        return $this->belongsToMany('SupremeSTAN\BundleTKD','kdTKD_bundleTKD','kdTKD_id','bundleTKD_id');
    }
}
