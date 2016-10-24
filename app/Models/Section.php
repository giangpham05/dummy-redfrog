<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public $timestamps = false;
    public function surveys()
    {
        return $this->belongsToMany('App\Models\Survey')->withPivot('inheritFlag', 'orderNo','created_at');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question')->withPivot('inheritFlag', 'orderNo');
    }
}
