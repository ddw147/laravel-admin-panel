<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\User;
use App\OauthToken;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(LoginRequest $request)
    {
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $request->merge([$field => $request->input('login') ]);

        if (Auth::attempt($request->only($field, 'password'))) {
            if (Auth::user()->is_locked) {
                 Auth::logout();
                 return redirect('/login')->withErrors(
                     [
                     'email' => 'These credentials are blcoked please contact us for unblocking.',
                     ]
                 );
            }
            return redirect('/');
        }

        return redirect('/login')->withErrors(
            [
            'email' => 'These credentials do not match our records.',
            ]
        );
    }
        
    public function showLoginForm($value = '')
    {
        return view('auth.login');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {
            

        $github_user = Socialite::driver($provider)->user();
        
        $user = User::where('email', $github_user->email)->first();

        $token= [
                    'token'=>$github_user->token,
                    'provider'=>$provider,
                    'email'=>$github_user->email,
                    'name'=>$github_user->name
                ];
        $OauthToken = new OauthToken($token);

        if (is_null($user)) {
            return redirect('/register')->with($token);
        }
                
        $user->tokens()->save($OauthToken);
        Auth::login($user);
        return redirect('/');
    }
}
