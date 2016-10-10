<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BundleQuiz extends Model
{
    protected $table = 'bundlequiz';
    protected $fillable = [
        'publish_date',
        'published',
        'jumlah_soal',
        'durasi'
    ];

    public function bankQuiz()
    {
        return $this->belongsToMany('BankQuiz');
    }

    public function jawabanQuiz()
    {
        return $this->belongsTo('JawabanQuiz');
    }
}
