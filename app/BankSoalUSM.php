<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BankSoalUSM extends Model
{
    protected $table = 'banksoalUSM';
    public $timestamps = false;
    protected $fillable = [
        'kdUSM_id',
        'isi_soal',
        'jawaban_a',
        'jawaban_b',
        'jawaban_c',
        'jawaban_d',
        'kunciUSM_id',
        'pembahasanUSM_id'
    ];
    protected $guarded = ["id"];

    public function kunciUsm()
    {
        return $this->belongsTo('SupremeSTAN\KunciUSM','kunciUSM_id');
    }

    public function pembahasanUsm()
    {
        return $this->belongsTo('SupremeSTAN\PembahasanUSM','pembahasanUSM_id');
    }

    public function kdUsm()
    {
        return $this->belongsTo('SupremeSTAN\KdUSM','kdUSM_id');
    }

    public function bundleUsm()
    {
        return $this->belongsToMany('SupremeSTAN\BundleUSM','banksoalUSM_bundleUSM','banksoalUSM_id','bundleUSM_id');
    }
}
