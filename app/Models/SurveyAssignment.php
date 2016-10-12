<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SurveyAssignment extends Model
{
    protected $table = 'survey_assignments';
    public $timestamps = false;
    protected $fillable = [
        'uuid', 'survey_id', 'assign_timestamp','due_timestamp',
        'assign_status','active_flag','date_deactivated'];
    public function survey(){
        return $this->belongsTo('App\Models\Survey', 'survey_id');
    }

    public function client(){
        return $this->belongsTo('App\Models\Client', 'uuid');
    }

    public function setDueTimestampAttribute($date){
        //$this->attributes['due_timestamp'] = Carbon::createFromFormat('need format here', $date);
        $this->attributes['due_timestamp'] = Carbon::parse($date); // set to mid night
    }
}
