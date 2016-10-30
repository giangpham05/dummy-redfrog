<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientAnswer extends Model
{
    protected $table = 'clients_answers';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = array('uuid', 'survey_id', 'question_id','questionAnswer', 'created_at');
    public function client(){
        return $this->belongsTo('App\Models\Client', 'uuid');
    }

    public function survey(){
        return $this->belongsTo('App\Models\Survey', 'survey_id');
    }

    public function question(){
        return $this->belongsTo('App\Models\Question', 'question_id');
    }
}
