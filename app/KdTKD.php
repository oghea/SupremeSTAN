<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class KdTKD extends Model
{
    protected $table = 'kdTKD';
    public $timestamps = true;
    protected $fillable = [
        'nama',
        'jumlah_soal'
    ];
    protected $guarded = ["id"];

    public function bankSoalTkd()
    {
        return $this->belongsTo('BankSoalTKD');
    }
}
