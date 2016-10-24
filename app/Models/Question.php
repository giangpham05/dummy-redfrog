<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    public function question_type()
    {
        return $this->belongsTo('App\Models\QuestionType', 'intQuesTypeID');
    }

    public function sections()
    {
        return $this->belongsToMany('App\Models\Section')->withPivot('inheritFlag', 'orderNo');
    }


    public function clients_answers()
    {
        return $this->hasMany('App\Models\ClientAnswer', 'question_id');
    }

    public function options()
    {
        return $this->hasMany('App\Models\Option');
    }

}
