<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BankSoalTKD extends Model
{
    protected $table = 'banksoalTKD';
    public $timestamps = true;
    protected $fillable = [
        'kdTKD_id',
        'isi_soal',
        'jawaban_a',
        'jawaban_b',
        'jawaban_c',
        'jawaban_d',
        'jawaban_e',
        'kunciTKD_id',
        'pembahasanTKD_id'
    ];
    protected $guarded = ["id"];

    public function kunciTkd()
    {
        return $this->hasOne('KunciTKD');
    }

    public function pembahasanTkd()
    {
        return $this->hasOne('PembahasanTKD');
    }

    public function kdTkd()
    {
        return $this->hasOne('KdTKD');
    }

    public function tryoutTKD()
    {
        return $this->belongsToMany('TryoutTKD');
    }
}
