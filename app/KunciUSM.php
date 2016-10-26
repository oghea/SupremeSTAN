<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class KunciUSM extends Model
{
    protected $table = 'kunciUSM';
    public $timestamps = false;
    protected $fillable = [
        'jawaban_benar'
    ];
    protected $guarded = ["id"];

    public function bankSoalUsm()
    {
        return $this->hasOne('SupremeSTAN\BankSoalUSM');
    }
}
