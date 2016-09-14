<?php

namespace App\Http\Controllers;


use App\Models\Twitter;
use Illuminate\Http\Request;

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
        $recommendedUsers = [];
        $twitterUsers = $this->twitterApi->getUsersFromDB();
        foreach($twitterUsers as $users) {
            if(!$users->follow_him){
                $twitterUsersLive = $this->twitterApi->getUsersByScreenName($users->screen_name);
                $twitterUsersLive->status->text = $this->generateLinks($twitterUsersLive->status->text);
                $recommendedUsers[] = $twitterUsersLive;
            }
        }
        return view('twitter.follow-users', compact('recommendedUsers'));
    }

    public function follow($screenName) {
        $rs = $this->twitterApi->followUserByScreenName($screenName);
        $user = Twitter::where('screen_name', $screenName)->get()->first();
        $user->follow_him = 1;
        $user->update();
        return redirect('/recommended/twitter-users');
    }
    public function unfollow($screenName) {
        $rs = $this->twitterApi->unFollowUserByScreenName($screenName);
        $user = Twitter::where('screen_name', $screenName)->get()->first();
        $user->follow_him = 0;
        $user->update();
        return redirect('/recommended/twitter-users');
    }



    public function home(Request $request) {
        $recommendedUsers = [];
        $twitterUsers = $this->twitterApi->getUsersFromDB();
        foreach($twitterUsers as $users) {
            if(!$users->follow_him){
                $twitterUsersLive = $this->twitterApi->getUsersByScreenName($users->screen_name);
                $twitterUsersLive->status->text = $this->generateLinks($twitterUsersLive->status->text);
                $recommendedUsers[] = $twitterUsersLive;
            }
        }
        return view('twitter.home', compact('recommendedUsers'));
    }

    public function course() {
        return view('templates.note_detail');
    }



}
