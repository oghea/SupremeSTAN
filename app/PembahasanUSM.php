<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class PembahasanUSM extends Model
{
    protected $table = 'pembahasanUSM';
    public $timestamps = true;
    protected $fillable = [
        'description'
    ];
    protected $guarded = ["id"];

    public function bankSoalUsm()
    {
        return $this->belongsTo('BankSoalUSM');
    }
}
