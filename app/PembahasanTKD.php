<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class PembahasanTKD extends Model
{
    protected $table = 'pembahasanTKD';
    public $timestamps = false;
    protected $fillable = [
        'description'
    ];
    protected $guarded = ["id"];

    public function bankSoalTkd()
    {
        return $this->hasOne('SupremeSTAN\BankSoalTKD');
    }
}
