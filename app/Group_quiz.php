<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_quiz extends Model
{
    protected $table = 'Groups_quizs';
    protected $fillable = ['groups_id','quizs_id'];
}
