<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class BundleUSM extends Model
{
    protected $table = 'bundleUSM';
    public $timestamps = false;
    protected $fillable = [
        'judul',
        'subject_id'
    ];

    public function bankSoalUsm()
    {
        return $this->belongsToMany('BankSoalUSM');
    }

    public function subjectUsm()
    {
        return $this->hasOne('SubjectUSM');
    }

    public function tryoutUsm()
    {
        return $this->belongsToMany('TryoutUSM');
    }
}
