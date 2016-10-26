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
        return $this->belongsTo('SupremeSTAN\KunciTKD','kunciTKD_id');
    }

    public function pembahasanTkd()
    {
        return $this->belongsTo('SupremeSTAN\PembahasanTKD','pembahasanTKD_id');
    }

    public function kdTkd()
    {
        return $this->belongsTo('SupremeSTAN\KdTKD','kdTKD_id');
    }

    public function tryoutTKD()
    {
        return $this->belongsToMany('SupremeSTAN\TryoutTKD','banksoalTKD_tryoutTKD','banksoalTKD_id','tryoutTKD_id');
    }
}
