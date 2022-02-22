<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeAmounts extends Model
{
    protected $fillable=['fee_categories_amounts_id','semesters_id[]', 'amount[]'];
    
    public function semesters()
    {
        return $this->belongsTo(Semesters::class);
    }
     public function students()
    {
        return $this->belongsTo(Students::class);
    }
    // public function fee_categories()
    // {
    //     return $this->belongsTo(Fee_Categories::class);
    // }
}
