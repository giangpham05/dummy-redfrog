<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function question_type()
    {
        return $this->belongsTo('App\Models\QuestionType');
    }
}
