<?php

namespace Controllers;

class BlogController
{
    public function __construct(array $params = [])
    {       
        var_dump($params); 
        echo '<br />[Blog contructor]<br />';
    }

    public function index(...$params)
    {
        var_dump($params);
        echo 'Blog INDEX';
    }

    public function details(...$params) {
        echo 'Blog DETAILS';
    }
}