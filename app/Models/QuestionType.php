<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    //protected $table = 'tbl_Question_Type';
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'intQuesTypeID');
    }

    public function options()
    {
        return $this->hasMany('App\Models\Option', 'question_types_id');
    }
}
