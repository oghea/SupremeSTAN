<?php

namespace SupremeSTAN;

use Illuminate\Database\Eloquent\Model;

class TryoutTKD extends Model
{
    protected $table = 'tryoutTKD';
    protected $fillable = [
        'judul',
        'publishdate',
        'published',
        'durasi'
    ];
    public function bundleTkd(){
        return $this->belongsToMany('SupremeSTAN\BundleTKD','bundleTKD_tryoutTKD','tryoutTKD_id','bundleTKD_id');
    }

    public function jawabanTkd()
    {
        return $this->hasOne('SupremeSTAN\JawabanTKD');
    }

    public function resultTkd()
    {
        return $this->hasOne('SupremeSTAN\ResultTKD');
    }
}
