<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable=['course_name', 'course_code', 'course_credit', 'departments_id', 'semesters_id'];
    
    public function departments()
    {
    	return $this->belongsTo(Departments::class);
    }
    public function semesters()
    {
    	return $this->belongsTo(Semesters::class);
    }
}
