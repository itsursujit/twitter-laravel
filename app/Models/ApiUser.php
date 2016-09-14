<?php


namespace App\Models;


class ApiUser extends ApiBase
{
    public function getAllUsers($param = null) {
        return $this->getNow('users', $param);
    }

    public function authLogin($param) {
        return $this->postNow('auth/signIn', $param);
    }

    public function postUser($param) {
        return $this->postNow('auth/signUp', $param);
    }

    public function uploadFile($param) {
        return $this->uploadNow('user/upload/file', $param);
    }
}