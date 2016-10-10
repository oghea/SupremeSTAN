<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class JawabanQuiz extends Model
{
    protected $table = 'jawabanquiz';
    protected $fillable = [
        'bundlequiz_id',
        'user_id',
        'resultquiz_id',
        'isi_jawaban',
    ];

    public function bundleQuiz()
    {
        return $this->hasOne('BundleQuiz');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
    public function resultQuiz()
    {
        return $this->hasOne('ResultQuiz');
    }
}
