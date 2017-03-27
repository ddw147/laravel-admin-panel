<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    //
    protected $fillable = ['otp','user_id','purpose'];



    public function user()
    {	
    	$this->belongsTo('App\User');
    }
}
