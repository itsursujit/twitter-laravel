<?php


namespace App\Models;


class ApiNote extends ApiBase
{
    public function getAllNotes($param = null) {
        return $this->getNow('notes', $param);
    }
}