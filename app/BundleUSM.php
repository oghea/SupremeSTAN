<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BundleUSM extends Model
{
    protected $table = 'bundleUSM';
    public $timestamps = false;
    protected $fillable = [
        'judul',
        'subjectUSM_id',
        'durasi'
    ];

    public function bankSoalUsm()
    {
        return $this->belongsToMany('SupremeSTAN\BankSoalUSM','banksoalUSM_bundleUSM','bundleUSM_id','banksoalUSM_id');
    }
    public function kdUSM(){
        return $this->belongsToMany('SupremeSTAN\KdUSM','bundleUSM_kdUSM','bundleUSM_id','kdUSM_id');
    }

    public function subjectUsm()
    {
        return $this->belongsTo('SupremeSTAN\SubjectUSM','subjectUSM_id');
    }

    public function tryoutUsm()
    {
        return $this->belongsToMany('SupremeSTAN\TryoutUSM');
    }
}
