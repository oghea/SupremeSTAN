<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class ResultQuiz extends Model
{
    protected $table = 'resultQuiz';
    protected $fillable = [
        'result',
        'nilai'
    ];

    public function jawabanQuiz()
    {
        return $this->hasOne('SupremeSTAN\JawabanQuiz');
    }
}
