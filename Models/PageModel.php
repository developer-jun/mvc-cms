<?php

namespace Models;

use Models\MetatagModel;

class PageModel
{
    public string $page_title;
    public MetatagModel $meta_tags;
    public string $header_title;
    public string $content;

    public function __construct(
        $page_title,        
        $meta_tags,
        $header_title,
        $content,
    ){
        $this->page_title = $page_title;
        $this->meta_tags = $meta_tags;
        $this->header_title = $header_title;
        $this->content = $content;
    }   
}