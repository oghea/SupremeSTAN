<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BundleQuiz extends Model
{
    protected $table = 'bundleQuiz';
    protected $fillable = [
        'judul',
        'publish_date',
        'published',
        'jumlah_soal',
        'durasi',
        'full'
    ];

    public function bankQuiz()
    {
        return $this->belongsToMany('SupremeSTAN\BankQuiz','banksoalQuiz_bundleQuiz','bundleQuiz_id','banksoalQuiz_id');
    }

    public function jawabanQuiz()
    {
        return $this->belongsTo('SupremeSTAN\JawabanQuiz');
    }
}
