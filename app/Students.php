<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
   protected $fillable=['student_first_name', 'student_last_name', 'student_id', 'username', 'password', 'departments_id', 'courses_id', 'semesters_id', 'divisions_id', 'districts_id', 'upozilas_id', 'village_name', 'student_email', 'student_mobile', 'student_picture'];
    
    public function departments()
    {
    	return $this->belongsTo(Departments::class);
    }
    public function divisions()
    {
    	return $this->belongsTo(Divisions::class);
    }
    public function districts()
    {
    	return $this->belongsTo(Districts::class);
    }
    public function upozilas()
    {
    	return $this->belongsTo(Upozilas::class);
    }
    public function courses()
    {
    	return $this->belongsTo(Courses::class);
    }
    public function semesters()
    {
        return $this->belongsTo(Semesters::class);
    }
}
