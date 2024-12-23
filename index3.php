<?php
require_once './init.php';

use App\Url;
use App\Controller;
use App\Factories\ViewFactory;

/// CONTROLLER
// Handles routing, map the url path to a page template
$controller = new Controller(Url::get());

// How do we handle POST requests?
// Let's handle that here
// Step 1: 


/// MODEL 
// GET data from this section to be used by the view, our controller should that have those info
$page_data = [
    'page_title' => 'My MVC',
    'meta_description' => 'Tiiny CMS is a simple CMS built with PHP',
    'meta_keywords' => 'CMS, PHP, Simple CMS',
];
$page_data['template'] = DEFAULT_TEMPLATE;



/// VIEW
// Handle the VIEW section
$template_data = [
    'template' => DEFAULT_TEMPLATE,
    'template_path' => TEMPLATE_PATH,
    'page_file' => TEMPLATE_PATH . 'pages/'. $controller->getContentFilename(),
];

$view = ViewFactory::createView($template_data, $page_data);
$view->render();
