<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BankQuiz extends Model
{
    protected $table = 'banksoalQuiz';
    public $timestamps = false;
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
        return $this->belongsTo('SupremeSTAN\KunciQuiz','kunciQuiz_id');
    }

    public function pembahasanQuiz()
    {
        return $this->belongsTo('SupremeSTAN\PembahasanQuiz','pembahasanQuiz_id');
    }

    public function bundleQuiz()
    {
        return $this->belongsToMany('SupremeSTAN\BundleQuiz','banksoalQuiz_bundleQuiz','banksoalQuiz_id','bundleQuiz_id');
    }
}
