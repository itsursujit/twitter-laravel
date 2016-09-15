<?php

namespace App\Http\Controllers\Auth;

use App\Models\Twitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function logout(Request $request){
        Auth::logout();
        Session::flush();
        return redirect('/');

    }

    public function handleTwitterCallback(Request $request)
    {
        try {
            $user = Socialite::driver('twitter')->user();
            $request->session()->put($request->all());
            $create['name'] = $user->name;
            $create['email'] = $user->email;
            $create['twitter_id'] = $user->id;

            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);
            $allFriends = DB::select("SELECT * FROM recommended_friends");
            $myFriends = DB::select("SELECT * FROM twitter_friends WHERE current_user_id = ".$createdUser->id);
            foreach($allFriends as $friends)
            {
                $existsStatus = false;
                foreach($myFriends as $frens) {
                    if($friends->screen_name == $frens->screen_name){
                        $existsStatus = true;
                    }
                }
                if(!$existsStatus){
                    Twitter::create([
                        'user_id' => $friends->user_id,
                        'screen_name' => $friends->screen_name,
                        'current_user_id' => $createdUser->id
                    ]);
                }
            }
            return redirect('/recommended/twitter-users');

        } catch (Exception $e) {
            return redirect('auth/twitter');
        }
    }
}
