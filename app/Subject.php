<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'Subjects';
    public $primaryKey = 'subject_id';
    // protected $fillable = ['subject_id','subject_name'];
}
