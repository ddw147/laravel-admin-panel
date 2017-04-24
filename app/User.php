<?php
/**
 * User Model , store user related data and its relationships
 *
 *  * @category Class
 * @package  User
 * @author   Admin admin@laraveladmin.com
 */
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

use App\Otp;
use Carbon\Carbon;
use App\Notifications\OtpNotification;

/**
 * Class user will bind with users table
 */
class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile','is_verified'
    ];

     


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Users relationsships
     */


    public function otps()
    {
        return $this->hasMany('App\Otp');
    }

    /**
     * Get last otp
     */
    public function lastotp()
    {
        return  $this->otps->where('created_at', '>=', Carbon::now()->subHour())->last();
    }

    /**
     * get Oauth Tokens
     */

    public function tokens()
    {
        return $this->hasMany('App\OauthToken');
    }

    /**
     * get providers toekn
     */

    public function token($provider = '')
    {
        return $this->tokens->where('provider', $provider)->last();
    }


    /**
     *  user methods
     */

    public function sendotp()
    {
        
        $otp= $this->lastotp();
        if (is_null($otp)) {
            $otp = $this->setotp();
        }
        

        $this->notify(new OtpNotification($otp));
    }

    public function setotp()
    {
        $otp= new Otp();
        $otp->otp=rand(100000, 999999);
        $otp->purpose ='Registration';
        $this->otps()->save($otp);

        return $otp;
    }

    public function verify()
    {
        $this->is_verified=true;
        $this->save();
    }

    public function block()
    {
        $this->is_locked=true;
        $this->save();
    }

    public function unblock()
    {
        $this->is_locked=false;
        $this->save();
    }
   

    

    public function verify_password($oldPassword = '')
    {
        echo bcrypt($oldPassword);
        dd($this->password);
        return ($this->password == (bcrypt($oldPassword)) );
    }
}
