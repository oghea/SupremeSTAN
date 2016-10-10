<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class TryoutUSM extends Model
{
    protected $table = 'tryoutUSM';
    public $timestamps = false;
    protected $fillable = [
        'judul',
        'publishdate',
        'publish'
    ];

    public function bundleUsm()
    {
        return $this->belongsToMany('BundleUSM');
    }

    public function jawabanUsm()
    {
        return $this->hasOne('JawabanUSM');
    }

    public function resultUsm()
    {
        return $this->hasOne('ResultUSM');
    }
}
