<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class JawabanQuiz extends Model
{
    protected $table = 'jawabanquiz';
    public $timestamps = false;
    protected $fillable = [
        'bundlequiz_id',
        'user_id',
        'resultquiz_id',
        'isi_jawaban',
    ];

    public function bundleQuiz()
    {
        return $this->hasOne('SupremeSTAN\BundleQuiz');
    }

    public function user()
    {
        return $this->belongsTo('SupremeSTAN\User');
    }
    public function resultQuiz()
    {
        return $this->hasOne('SupremeSTAN\ResultQuiz');
    }
}
