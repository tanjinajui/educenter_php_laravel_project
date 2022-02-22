<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseAsignMultiple extends Model
{
    protected $fillable=['student_first_name', 'student_last_name', 'semesters_id', 'departments_id', 'courses_id[]', 'full_mark[]', 'pass_mark', 'subjecting_mark'];
    
     public function students()
    {
        return $this->belongsTo(Students::class);
    }
     public function semesters()
    {
    	return $this->belongsTo(Semesters::class);
    }
    public function departments()
    {
    	return $this->belongsTo(Departments::class);
    }
    public function courses()
    {
    	return $this->belongsTo(Courses::class);
    }
    public function course_asign_multiple()
    {
    	return $this->belongsTo(CourseAsignMultiple::class);
    }
   
}
