<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
   protected $fillable=['district_name','divisions_id'];
   public function divisions()
    {
    	return $this->belongsTo(Divisions::class);
    }
    
}
