<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses_asigns extends Model
{
    protected $fillable=['departments_id', 'courses_id', 'teachers_id', 'taken_credit', 'course_code', 'course_credit', 'semesters_id'];
    
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
