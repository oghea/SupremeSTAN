<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BundleTKD extends Model
{
    protected $table = 'bundleTKD';
    public $timestamps = true;
    protected $fillable = [
        'judul',
        'subjectUSM_id',
        'full'
    ];
    public function bankSoalTkd()
    {
        return $this->belongsToMany('SupremeSTAN\BankSoalTKD','banksoalTKD_bundleTKD','bundleTKD_id','banksoalTKD_id');
    }
    public function bankSoalTkp()
    {
        return $this->belongsToMany('SupremeSTAN\BankSoalTKP','banksoalTKP_bundleTKD','bundleTKD_id','banksoalTKP_id');
    }
    public function kdTKD(){
        return $this->belongsToMany('SupremeSTAN\KdTKD','bundleTKD_kdTKD','bundleTKD_id','kdTKD_id');
    }

    public function subjectTkd()
    {
        return $this->belongsTo('SupremeSTAN\SubjectTKD','subjectTKD_id');
    }

    public function tryoutTkd()
    {
        return $this->belongsToMany('SupremeSTAN\TryoutTKD','bundleTKD_tryoutTKD','bundleTKD_id','tryoutTKD_id');
    }
}
