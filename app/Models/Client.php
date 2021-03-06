<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['id', 'user_id', 'created_at'];

    public function clients_answers()
    {

        return $this->hasMany('App\Models\ClientAnswer', 'uuid');

    }


    public function this_user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function survey_assignments()
    {
        return $this->hasMany('App\Models\SurveyAssignment', 'uuid');
    }
}
