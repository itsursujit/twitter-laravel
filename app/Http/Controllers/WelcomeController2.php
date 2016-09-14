<?php

namespace App\Http\Controllers;

use App\Models\ApiNote;
use App\Models\ApiUser;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use League\OAuth1\Client\Server\Server;
use Illuminate\Support\Facades\Input;
use Abraham\TwitterOAuth\TwitterOAuth;
use Laravel\Socialite\Facades\Socialite;

class WelcomeController extends Controller
{
    public $api;
    public $noteApi;
    public $server;

    public function __construct()
    {
        //$this->api = new ApiUser();
        //$this->noteApi = new ApiNote();
    }

    public function index(){
        /*$notes = Note::all();
        dd($notes);
        $param = [
            'login' => 'admin',
            'password' => 'admin'
        ];
        $this->api = new ApiUser();
        $login = $this->api->authLogin($param);
        dd($login);*/
    }

    public function upload() {
        //$notes = $this->noteApi->getAllNotes();
        //dd($notes);
        return view('templates.upload');
    }
    public function uploadPost() {
        $data =  Input::file('image');
        $dd = $this->api->uploadFile($data);
        dd($dd);
    }

    public function edit() {
        return view('templates.edit');
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
