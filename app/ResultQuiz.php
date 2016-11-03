<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class ResultQuiz extends Model
{
    protected $table = 'resultQuiz';
    protected $fillable = [
        'result',
        'nilai_quiz'
    ];

    public function jawabanQuiz()
    {
        return $this->belongsTo('SupremeSTAN\JawabanQuiz');
    }
}
