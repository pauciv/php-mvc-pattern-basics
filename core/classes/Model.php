<?php

// superclass heredada en los models

class Model
{
    protected $db;
    function __construct()
    {
        $this->db = new Database();
    }
}
