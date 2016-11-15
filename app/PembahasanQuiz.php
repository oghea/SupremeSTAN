<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class PembahasanQuiz extends Model
{
    protected $table = 'pembahasanQuiz';
    public $timestamps = false;
    protected $fillable = [
        'description'
    ];
    protected $guarded = ["id"];

    public function bankQuiz()
    {
        return $this->hasOne('SupremeSTAN\BankQuiz');
    }
}
