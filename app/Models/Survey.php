<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SectionToSurvey;
class Survey extends Model
{
    //protected $table = 'surveys';
    //protected $sections;

    public $timestamps = false;
    protected $fillable = [
        'user_id', 'strSurveyName', 'strSurveyDesc','slug'
    ];

    public function sections()
    {
        //return $this->belongsToMany('App\Models\Section');
        return $this->belongsToMany('App\Models\Section');
    }

    public function clients(){
        return $this->belongsToMany('App\Models\Client','client_answer')->withTimestamps();
    }

    public function clients_answers()
    {
        return $this->hasMany('App\Models\ClientAnswer', 'survey_id');
    }

    public function survey_assignments()
    {
        return $this->hasMany('App\Models\SurveyAssignment', 'survey_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');

    }
//    public function getAllSectionAttribute($value)
//    {
//        return ucfirst($value);
//    }
//
//    public function setAllSectionAttribute($value){
//        $this->attributes['all_section'] = $value;
//    }
   // protected $appends = ['all_section'];


}
