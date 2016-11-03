<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BundleQuiz extends Model
{
    protected $table = 'bundleQuiz';
    protected $fillable = [
        'publish_date',
        'published',
        'jumlah_soal',
        'durasi'
    ];

    public function bankQuiz()
    {
        return $this->belongsToMany('SupremeSTAN\BankQuiz');
    }

    public function jawabanQuiz()
    {
        return $this->belongsTo('SupremeSTAN\JawabanQuiz');
    }
}
