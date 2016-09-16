<?php


namespace App\Models;


use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Twitter extends Model
{
    public $connection;
    protected $table = 'twitter_friends';
    protected $fillable = ['user_id', 'screen_name', 'follow_him', 'current_user_id'];
    public function getAuthConnection()
    {
        $this->connection = new TwitterOAuth(Config::get('services.twitter.client_id'), Config::get('services.twitter.client_secret'));
    }

    public function getTwitterConnection(){
        $oauth_token = Session::get('oauth_token');
        $oauth_token_secret = Session::get('oauth_token_secret');
        if(!empty($oauth_token) && !empty($oauth_token_secret)) {
            $this->connection = new TwitterOAuth(Config::get('services.twitter.client_id'), Config::get('services.twitter.client_secret'), $oauth_token, $oauth_token_secret);
        }
        //return $this->connection->get("account/verify_credentials");
    }

    public function sessionDestroy(){
        Session::flush();
    }

    public function getUsersFromDB($id){
        $data = DB::select("SELECT * FROM twitter_friends WHERE current_user_id = $id");
        return $data;
    }

    public function getUsersByScreenName($screenName) {
        $this->getTwitterConnection();
        $dude = $this->connection->get('users/show', ['screen_name'=>$screenName]);
        return $dude;
    }

    public function getUsersByUserId($userId) {
        $this->getTwitterConnection();
        $dude = $this->connection->get('users/show', ['user_id'=>$userId]);
        return $dude;
    }

    public function getAccessToken($oauth){
        $this->getTwitterConnection();
        $access = $this->connection->oauth("oauth/access_token", array("oauth_verifier" => $oauth['oauth_verifier']));
        Session::put('oauth_token', $access['oauth_token']);
        Session::put('oauth_token_secret', $access['oauth_token_secret']);
        return $access;
    }

    public function getAuthUrl() {
        $this->getAuthConnection();
        $token = $this->connection->oauth("oauth/request_token", array("oauth_callback" => Config::get('services.twitter.redirect')));
        Session::put($token);
        $url = $this->connection->url("oauth/authorize", ['oauth_token' => $token['oauth_token']]);
        return $url;
    }

    public function getAuth(){
        $this->getTwitterConnection();
        $access_token = $this->connection->oauth("oauth/request_token", ["oauth_verifier" => Session::get('oauth_verifier')]);
        return $access_token;
    }

    public function getCurrentLoggedInUser($oauth) {
        $this->getTwitterConnection();
        $access = $this->connection->oauth("oauth/access_token", array("oauth_verifier" => $oauth['oauth_verifier']));
        Session::put('oauth_token', $access['oauth_token']);
        Session::put('oauth_token_secret', $access['oauth_token_secret']);
        $this->getTwitterConnection();
        return $this->connection->get("account/verify_credentials");
    }

    public function followUserByScreenName($screenName) {
        $this->getTwitterConnection();
        $dudes = $this->connection->post('friendships/create', ['screen_name' => $screenName, 'follow' => true]);
        return $dudes;
    }
    public function followUserByUserId($userId) {
        $this->getTwitterConnection();
        $dudes = $this->connection->post('friendships/create', ['user_id' => $userId, 'follow' => true]);
        return $dudes;
    }

    public function unFollowUserByScreenName($screenName) {
        $this->getTwitterConnection();
        $dudes = $this->connection->post('friendships/destroy', ['screen_name' => $screenName]);
        return $dudes;
    }
    public function unFollowUserByUserId($userId) {
        $this->getTwitterConnection();
        $dudes = $this->connection->post('friendships/destroy', ['user_id' => $userId]);
        return $dudes;
    }

    public function getUserTweetsByScreenName($screenName, $count = 3, $excludeReplies = true) {
        $this->getTwitterConnection();
        $tweets = $this->connection->get("statuses/home_timeline", ["screen_name"=>$screenName,"count" => $count, "exclude_replies" => $excludeReplies]);
        return $tweets;
    }

    public function getSelfTimeLine(){
        $this->getTwitterConnection();
        $statuses = $this->connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);
        return $statuses;
    }

    public function getUserTweetsById($userId, $count = 3, $excludeReplies = true) {
        $this->getTwitterConnection();
        $tweets = $this->connection->get("statuses/home_timeline", ["user_id"=>$userId,"count" => $count, "exclude_replies" => $excludeReplies]);
        return $tweets;
    }

}