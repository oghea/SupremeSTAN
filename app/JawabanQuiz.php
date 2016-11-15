<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class JawabanQuiz extends Model
{
    protected $table = 'jawabanQuiz';
    public $timestamps = false;
    protected $fillable = [
        'bundleQuiz_id',
        'user_id',
        'resultQuiz_id',
        'isi_jawaban',
        'urutan',
    ];

    public function bundleQuiz()
    {
        return $this->belongsTo('SupremeSTAN\BundleQuiz','bundleQuiz_id');
    }

    public function user()
    {
        return $this->belongsTo('SupremeSTAN\User');
    }
    public function resultQuiz()
    {
        return $this->belongsTo('SupremeSTAN\ResultQuiz','resultQuiz_id');
    }
}
