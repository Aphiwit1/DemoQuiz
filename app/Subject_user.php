<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_user extends Model
{
    protected $table = 'subjects_user';
    protected $fillable = ['subject_id','username'];
}
