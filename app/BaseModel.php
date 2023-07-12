<?php

namespace App;

abstract class BaseModel
{
    protected DB $db;

    public function  __construct()
    {
        $this->db = App::db();
    }
}