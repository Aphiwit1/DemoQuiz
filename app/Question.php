<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'Questions';
    public $timestamps = false;
    public $primaryKey = 'questions_id';
    

    
}
