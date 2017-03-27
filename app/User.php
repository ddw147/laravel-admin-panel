<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Otp;
use Carbon\Carbon;
use App\Notifications\OtpNotification;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile','otp','is_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendotp()
    {
        
       $otp= $this->otps->where('created_at','>=' , Carbon::now()->subHour())->last();
       if(is_null($otp))
        $otp= $this->setotp();

        $this->notify(new OtpNotification($otp));

    }

    public function setotp()
    {
       $otp= new Otp();     
       $otp->otp=rand(100000,999999);
       $otp->purpose ='Registration';
       $this->otps()->save($otp);

       return $otp;

    }


   

    public function otps()
    {
        return $this->hasMany('App\Otp');
    }

}
