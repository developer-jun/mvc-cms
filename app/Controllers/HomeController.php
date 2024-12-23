<?php

namespace App\Controllers;

class HomeController
{
    public function __construct()
    {
        echo 'Welcome CONSTRUCT';
    }

    public function index()
    {
        echo 'Welcome HOME';
    }
}