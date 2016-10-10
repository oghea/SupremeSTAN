<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class SubjectUSM extends Model
{
    protected $table = 'subjectUSM';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'Deskripsi',
        'durasi'
    ];

    public function bundleUsm()
    {
        return $this->belongsTo('BundleUSM');
    }
}
