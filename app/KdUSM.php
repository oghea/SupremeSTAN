<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class KdUSM extends Model
{
    protected $table = 'kdUSM';
    public $timestamps = true;
    protected $fillable = [
        'nama',
        'jumlah_soal'
    ];
    protected $guarded = ["id"];

    public function bankSoalUsm()
    {
        return $this->belongsTo('BankSoalUSM');
    }
}
