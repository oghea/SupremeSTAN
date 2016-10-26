<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class PembahasanQuiz extends Model
{
    protected $table = 'pembahasanquiz';
    public $timestamps = true;
    protected $fillable = [
        'description'
    ];
    protected $guarded = ["id"];

    public function bankQuiz()
    {
        return $this->belongsTo('SupremeSTAN\BankQuiz');
    }
}
