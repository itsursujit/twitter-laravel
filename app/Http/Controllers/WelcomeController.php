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

    public function twitterUsers() {
        $twitterUsers = $this->twitterApi->getUsersFromDB();
        return view('twitter.follow-users');
    }


    public function home(Request $request) {
        //$connection = new TwitterOAuth(Config::get('services.twitter.client_id'), Config::get('services.twitter.client_secret'), Config::get('services.twitter.access_token'), Config::get('services.twitter.access_token_key'));
        //$content = $connection->get("account/verify_credentials");
        //dd($content);
        //$friends = $connection->post('friendships/create', ['screen_name' => 'jack', 'follow' => true]);
        //$friends = $connection->get('friends/ids', ['screen_name' => 'jack']);
        //$friends = $connection->get('users/show', ['screen_name'=>'yukihiro_matz']);
        //$friends = $connection->get("statuses/home_timeline", ["screen_name"=>'yukihiro_matz',"count" => 3, "exclude_replies" => true]);
        //dd($friends);
        //return view('templates.home');
    }

    public function course() {
        return view('templates.note_detail');
    }



}
