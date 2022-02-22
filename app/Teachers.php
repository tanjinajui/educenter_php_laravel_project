<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
   protected $fillable=['teacher_name', 'teacher_code', 'taken_credit', 'max_credit', 'teacher_email', 'teacher_mobile', 'departments_id', 'teacher_picture'];
    
    public function departments()
    {
    	return $this->belongsTo(Departments::class);
    }
}
