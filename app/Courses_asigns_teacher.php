<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses_asigns_teacher extends Model
{
     protected $fillable=['departments_id', 'courses_id', 'teachers_id', 'semesters_id', 'total_course_credit','semester_course_credit'];
    
    public function departments()
    {
    	return $this->belongsTo(Departments::class);
    }
    public function courses()
    {
    	return $this->belongsTo(Courses::class);
    }
    public function course_code()
    {
    	return $this->belongsTo(Courses::class);
    }
    public function teachers()
    {
    	return $this->belongsTo(Teachers::class);
    }
    public function courses_asigns()
    {
    	return $this->belongsTo(Courses_asigns::class);
    }
    public function semesters()
    {
    	return $this->belongsTo(Semesters::class);
    }
}
