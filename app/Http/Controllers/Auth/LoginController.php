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

    public function redirectToGitProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGitProviderCallback()
    {
      return  $this->handleProviderCallBack('github'); 
    }

    public function handleGoogleProviderCallback()
    {
       return $this->handleProviderCallBack('google');
    }

    private function handleProviderCallBack($provider){
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->route("login.$provider");
        }
       
       
        $authUser = $this->findOrCreateUser($user,$provider);
        
        Auth::login($authUser, true);

        return redirect()->route('posts.index');
    }

    private function findOrCreateUser($user , $provider)
    {
       
        if ($authUser = User::where('github_id', $user->id)->first()) {
            
            return $authUser;
        } 
        else if($authUser = User::where('email',$user->email)->first()){
            $authUser->update([$provider."_id"=>$user->id]);
            return $authUser;
        }
        $name =  $user->name ? $user->name : $user->nickname;
        return User::create([
            'name'      => $name,
            'email'     => $user->email,
            $provider."_id" => $user->id,
        ]);
    }
}
