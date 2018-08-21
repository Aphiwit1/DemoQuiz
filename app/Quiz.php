<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizs';
    public $primaryKey = 'quizs_id';
    // protected $fillable = ['quiz_id','quiz_date','quiz_title','quiz_description'];

    // public function quiz_status(){
    //     return $this->belongsTo('App\Quiz_status');
    // }

    // public function quiz_type(){
    //     return $this->belongsTo('App\quiz_type');
    // }
}
