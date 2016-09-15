<?php


namespace App\Models;


use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Twitter extends Model
{
    public $connection;
    protected $table = 'twitter_friends';
    protected $fillable = ['user_id', 'screen_name', 'follow_him', 'current_user_id'];
    public function getTwitterConnection()
    {
        $this->connection = new TwitterOAuth(Config::get('services.twitter.client_id'), Config::get('services.twitter.client_secret'), Config::get('services.twitter.access_token'), Config::get('services.twitter.access_token_key'));
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

    public function getCurrentLoggedInUser() {
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

    public function getUserTweetsById($userId, $count = 3, $excludeReplies = true) {
        $this->getTwitterConnection();
        $tweets = $this->connection->get("statuses/home_timeline", ["user_id"=>$userId,"count" => $count, "exclude_replies" => $excludeReplies]);
        return $tweets;
    }

}