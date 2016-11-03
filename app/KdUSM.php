<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class KdUSM extends Model
{
    protected $table = 'kdUSM';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'jumlah_soal'
    ];
    protected $guarded = ["id"];

    public function bankSoalUsm()
    {
        return $this->hasMany('SupremeSTAN\BankSoalUSM');
    }
    public function bundleUSM(){
        return $this->belongsToMany('SupremeSTAN\BundleUSM','bundleUSM_kdUSM','kdUSM_id','bundleUSM_id');
    }
}
