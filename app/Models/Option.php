<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;
    protected $fillable = ['questionOption', 'question_id','inheritFlag'];
    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function options()
    {
        return $this->hasMany('App\Models\Option');
    }
}
