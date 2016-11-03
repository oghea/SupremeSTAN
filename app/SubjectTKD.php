<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class SubjectTKD extends Model
{
    protected $table = 'subjectTKD';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'Deskripsi',
    ];

    public function bundleTkd()
    {
        return $this->hasMany('SupremeSTAN\BundleTKD');
    }
}
