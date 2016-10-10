<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class KunciTKD extends Model
{
    protected $table = 'kunciTKD';
    public $timestamps = true;
    protected $fillable = [
        'jawaban_benar'
    ];
    protected $guarded = ["id"];

    public function bankSoalTkd()
    {
        return $this->belongsTo('BankSoalTKD');
    }
}
