<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function question_type()
    {
        return $this->belongsTo('App\Models\QuestionType', 'intQuesTypeID');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'intSectionID');
    }


    public function clients_answers()
    {
        return $this->hasMany('App\Models\ClientAnswer', 'question_id');
    }

}
