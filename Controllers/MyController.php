<?php

namespace Controllers;

class MyController
{
    public function __construct()
    {
        echo 'My Welcome CONSTRUCT';
    }

    public function index()
    {
        echo 'My Welcome HOME';
    }
}