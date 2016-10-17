<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BankSoalUSM extends Model
{
    protected $table = 'banksoalUSM';
    public $timestamps = true;
    protected $fillable = [
        'kdUSM_id',
        'isi_soal',
        'jawaban_a',
        'jawaban_b',
        'jawaban_c',
        'jawaban_d',
        'jawaban_e',
        'kunciUSM_id',
        'pembahasanUSM_id'
    ];
    protected $guarded = ["id"];

    public function kunciUsm()
    {
        return $this->hasOne('KunciUSM');
    }

    public function pembahasanUsm()
    {
        return $this->hasOne('PembahasanUSM');
    }

    public function kdUsm()
    {
        return $this->belongsTo('KdUSM');
    }

    public function bundleUsm()
    {
        return $this->belongsToMany('BundleUSM');
    }
}
