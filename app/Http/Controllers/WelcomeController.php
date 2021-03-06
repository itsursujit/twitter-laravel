<?php

namespace App\Http\Controllers;


use App\Models\Twitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public $twitterApi;
    public $noteApi;
    public $server;

    public function __construct()
    {
        $this->twitterApi = new Twitter();
        //$this->noteApi = new ApiNote();
    }

    public function generateLinks($string){
        $string = preg_replace(
            "~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~",
            "<a href=\"\\0\">\\0</a>",
            $string);
        return $string;
    }

    public function twitterUsers() {
        if(!Auth::user()){
            return redirect('/login');
        }
        $recommendedUsers = [];
        $twitterUsers = $this->twitterApi->getUsersFromDB(Auth::user()->id);
        foreach($twitterUsers as $users) {
            if(!$users->follow_him){
                $twitterUsersLive = $this->twitterApi->getUsersByScreenName($users->screen_name);
                $twitterUsersLive->status->text = $this->generateLinks($twitterUsersLive->status->text);
                $recommendedUsers[] = $twitterUsersLive;
            }
        }

        if(count($recommendedUsers)>0){
            return view('twitter.follow-users', compact('recommendedUsers'));
        }
        else{
            return redirect('/');
        }
    }

    public function follow($screenName) {
        if(!Auth::user()){
            return redirect('/login');
        }
        $rs = $this->twitterApi->followUserByScreenName($screenName);
        $user = DB::select("SELECT * from twitter_friends WHERE screen_name = '$screenName' AND current_user_id=".Auth::user()->id);// Twitter::where('screen_name', $screenName)->get()->first();
        if(isset($user[0])){
            $user = Twitter::find($user[0]->id);
        }
        $user->follow_him = 1;
        $user->update();
        return redirect('/recommended/twitter-users');
    }
    public function unfollow($screenName) {
        $rs = $this->twitterApi->unFollowUserByScreenName($screenName);
        $user = DB::select("SELECT * from twitter_friends WHERE screen_name = '$screenName' AND current_user_id=".Auth::user()->id);// Twitter::where('screen_name', $screenName)->get()->first();
        if(isset($user[0])){
            $user = Twitter::find($user[0]->id);
        }
        $user->follow_him = 0;
        $user->update();
        return redirect('/recommended/twitter-users');
    }



    public function home(Request $request) {
        if(!Auth::user()){
            return redirect('/login');
        }
        $data = $request->all();
        $recommendedUsers = [];
        $twitterUsers = $this->twitterApi->getUsersFromDB(Auth::user()->id);
        foreach($twitterUsers as $users) {
            if($users->follow_him){
                $twitterUsersLive = $this->twitterApi->getUsersByScreenName($users->screen_name);
                $twitterUsersLive->status->text = $this->generateLinks($twitterUsersLive->status->text);
                $recommendedUsers[] = $twitterUsersLive;
            }
        }
        return view('twitter.home', compact('recommendedUsers'));
    }

    public function partial(Request $request) {
        $data = $request->all();
        $recommendedUsers = [];
        $twitterUsers = $this->twitterApi->getUsersFromDB(Auth::user()->id);
        foreach($twitterUsers as $users) {
            if($users->follow_him){
                $twitterUsersLive = $this->twitterApi->getUsersByScreenName($users->screen_name);
                $twitterUsersLive->status->text = $this->generateLinks($twitterUsersLive->status->text);
                $recommendedUsers[] = $twitterUsersLive;
            }
        }
        foreach($data as $key => $value){
            $user_id = str_replace('user_','', $key);
            foreach($recommendedUsers as $i => $users){
                if($user_id == $users->id){
                    if($value == $users->status->id){
                        unset($recommendedUsers[$i]);
                    }
                }
            }
        }
        return view('twitter.partial-feed', compact('recommendedUsers'));

    }

    public function course() {
        return view('templates.note_detail');
    }





}
