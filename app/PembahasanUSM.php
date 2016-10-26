<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class PembahasanUSM extends Model
{
    protected $table = 'pembahasanUSM';
    public $timestamps = false;
    protected $fillable = [
        'description'
    ];
    protected $guarded = ["id"];

    public function bankSoalUsm()
    {
        return $this->hasOne('SupremeSTAN\BankSoalUSM');
    }
}
