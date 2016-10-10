<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BankQuiz extends Model
{
    protected $table = 'banksoalquiz';
    public $timestamps = true;
    protected $fillable = [
        'isi_soal',
        'jawaban_a',
        'jawaban_b',
        'jawaban_c',
        'jawaban_d',
        'jawaban_e',
        'kunciQuiz_id',
        'pembahasanQuiz_id'
    ];
    protected $guarded = ["id"];

    public function kunciQuiz()
    {
        return $this->hasOne('KunciQuiz');
    }

    public function pembahasanQuiz()
    {
        return $this->hasOne('PembahasanQuiz');
    }

    public function bundleQuiz()
    {
        return $this->belongsToMany('BundleQuiz');
    }
}
