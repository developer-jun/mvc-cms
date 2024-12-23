<?php
require_once './init.php';

use App\Url;
use App\Template;
use App\Controller;
use App\Logger;

// could be database driven
$page_data = array(
    'page_title' => 'Tiiny CMS',
    'meta_description' => 'Tiiny CMS is a simple CMS built with PHP',
    'meta_keywords' => 'CMS, PHP, Simple CMS',
);

// get template value from database if 

// Handles routing, map the url path to a page template
$controller = new Controller(Url::get(), new Template(DEFAULT_TEMPLATE, $page_data, new Logger('comment'), TEMPLATE_PATH));

// How do we handle POST requests? OR Javascript post request that doesn't require a page reload?
// Let's handle that here
// Step 1: 

$controller->view();

// Handles rendering, the controller gives us which page file to use,  both Template(general) and Page(specific)
//$template = new Template(DEFAULT_TEMPLATE, $page_data, new Logger('comment'), TEMPLATE_PATH);
//$template->render(['content_file' => $controller->getContentFilename()]);
