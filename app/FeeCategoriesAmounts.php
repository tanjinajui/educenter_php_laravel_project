<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeCategoriesAmounts extends Model
{
     protected $fillable=['student_first_name','student_last_name', 'student_email', 'fee_categories_id','dates', 'months_id','years_id'];
    // public function fee_amounts()
    //  {
    //     return $this->hasMany(Fee_Amounts::class);
    //  }
    public function students()
    {
        return $this->belongsTo(Students::class);
    }
     public function fee_categories()
    {
        return $this->belongsTo(FeeCategories::class);
    }
     public function years()
    {
        return $this->belongsTo(Years::class);
    } 
    public function months()
    {
        return $this->belongsTo(Months::class);
    }
     public function fee_amounts()
    {
        return $this->hasMany(FeeAmounts::class);
    }
   

}
