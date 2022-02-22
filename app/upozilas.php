<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upozilas extends Model
{
    protected $fillable=['upozila_name','divisions_id','districts_id'];
    public function divisions()
    {
    	return $this->belongsTo(Divisions::class);
    }
    public function districts()
    {
    	return $this->belongsTo(Districts::class);
    }
}
