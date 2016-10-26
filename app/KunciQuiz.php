<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class KunciQuiz extends Model
{
    protected $table = 'kunciquiz';
    public $timestamps = false;
    protected $fillable = [
        'jawaban_benar'
    ];
    protected $guarded = ["id"];

    public function bankQuiz()
    {
        return $this->belongsTo('SupremeSTAN\BankQuiz');
    }
}
