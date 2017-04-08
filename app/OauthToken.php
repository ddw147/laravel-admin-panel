<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthToken extends Model
{
    //

    protected $fillable= ['user_id','provider','token'];


    public function user()
    {
    	$this->belongsTo('App\User');
    }

}
