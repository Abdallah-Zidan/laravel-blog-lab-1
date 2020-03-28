<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return redirect()->route('login.github');
        }
       
        $authUser = $this->findOrCreateUser($user);
        
        Auth::login($authUser, true);

        return redirect()->route('posts.index');
        
    }

    private function findOrCreateUser($user)
    {
       
        if ($authUser = User::where('github_id', $user->id)->first()) {
            
            return $authUser;
        } 
        else if($authUser = User::where('email',$user->email)->first()){
            $authUser->update(['github_id'=>$user->id]);
            return $authUser;
        }
        $name =  $user->name ? $user->name : $user->nickname;
        return User::create([
            'name'      => $name,
            'email'     => $user->email,
            'github_id' => $user->id,
        ]);
    }
}
