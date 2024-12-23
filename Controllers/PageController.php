<?php

namespace Controllers;

use Models\PageModel;
use Models\MetatagModel;

use App\View;

use App\Helpers\Utilities;

class PageController
{
    private $page_meta;
    private $page_data;

    public function __construct(private array $params = [])
    {
        $this->page_meta = new MetatagModel('Project Tiny', 'Project Tiny Description', 'Project Tiny Keywords');
        $this->page_data = new PageModel(
            page_title: 'About Project Tiny',
            meta_tags: new MetatagModel(description: 'Tiny Description', keywords: 'tiny keywords', robots: ''),
            header_title: 'header title',
            content: '<p>The basic process is to define parameters, supply training data to generate a model on, then make predictions based on the model. There are a default set of parameters that should get some results with most any input, so we\'ll start by looking at the data.</p>
                      <p>Data is supplied in either a file, a stream, or as an array. If supplied in a file or a stream, it must contain one line per training example, which must be formatted as an integer class (usually 1 and -1) followed by a series of feature/value pairs, in increasing feature order. The features are integers, the values floats, usually scaled 0-1.</p>'
        );
    }

    public function index()
    {
        $this->page_data->page_title = 'Welcome to Project Tiny';
        return View::creator('home.php', Utilities::objectToArray($this->page_data));
        //var_dump($this->params);
    }

    public function about()
    {
        return View::creator('about.php', Utilities::objectToArray($this->page_data));
        /*$page = new PageModel(
            page_title: 'The About Page',
            meta_tags: new MetatagModel(description: 'Meta Description', keywords: 'meta keywords', robots: ''),
            header_title: 'About This Page',
            content: '<p>The basic process is to define parameters, supply training data to generate a model on, then make predictions based on the model. There are a default set of parameters that should get some results with most any input, so we\'ll start by looking at the data.</p>
                      <p>Data is supplied in either a file, a stream, or as an array. If supplied in a file or a stream, it must contain one line per training example, which must be formatted as an integer class (usually 1 and -1) followed by a series of feature/value pairs, in increasing feature order. The features are integers, the values floats, usually scaled 0-1.</p>'
        );*/
    }

    public function contact()
    {
        $page = new PageModel(
            page_title: 'The Contact Page',
            meta_tags: new MetatagModel(description: 'Meta Description', keywords: 'meta keywords', robots: ''),
            header_title: 'Contact This Page',
            content: '<p>The basic process is to define parameters, supply training data to generate a model on, then make predictions based on the model. There are a default set of parameters that should get some results with most any input, so we\'ll start by looking at the data.</p>
                      <p>Data is supplied in either a file, a stream, or as an array. If supplied in a file or a stream, it must contain one line per training example, which must be formatted as an integer class (usually 1 and -1) followed by a series of feature/value pairs, in increasing feature order. The features are integers, the values floats, usually scaled 0-1.</p>'
        );
        
        // var_dump($this->params);
        return View::creator('contact.php', [
            'title' => 'Contact Page',
            'heading' => 'Contact Page',
            'content' => 'This is the contact page'
        ]);
    }

    public function forms()
    {
        return View::creator('form.php', Utilities::objectToArray($this->page_meta));        
    }
}