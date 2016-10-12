<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function surveys()
    {
        return $this->belongsToMany('App\Models\Survey','App\Models\SectionToSurvey','intSectionID','intSurveyID');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
