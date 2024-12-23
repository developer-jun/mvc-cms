<?php

namespace Controllers;

class PageNotFoundController
{
    public function __construct()
    {
        
    }

    public function index()
    {
        echo '404 - Page not found';
    }
}