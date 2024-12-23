<?php

namespace Models;

class MetatagModel
{
    public function __construct(        
        public $description,
        public $keywords,
        public $robots = '',
    ){}
}
