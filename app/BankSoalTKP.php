<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BankSoalTKP extends Model
{
    protected $table = 'banksoalTKP';
    public $timestamps = false;
    protected $fillable = [
        'kdTKD_id',
        'isi_soal',
        'jawaban_a',
        'jawaban_b',
        'jawaban_c',
        'jawaban_d',
        'jawaban_e',
        'bobot_a',
        'bobot_b',
        'bobot_c',
        'bobot_d',
        'bobot_e',
        'pembahasanTKP'
    ];
    protected $guarded = ["id"];

    public function kdTkd()
    {
        return $this->belongsTo('SupremeSTAN\KdTKD','kdTKD_id');
    }

    public function bundleTkd()
    {
        return $this->belongsToMany('SupremeSTAN\BundleTKD','banksoalTKP_bundleTKD','banksoalTKP_id','bundleTKD_id');
    }
}
