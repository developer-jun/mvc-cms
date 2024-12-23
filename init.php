<?php

/*
 * Initialization file
 * Contains defined variables
 * Sets the autoloader
 */

// SITE_NAME
define('SITE_NAME', 'Tiiny CMS');

// define('TEMPLATE_PATH', './templates/');

// define('DEFAULT_TEMPLATE', TEMPLATE_PATH. '/layout/page.php');

// Root for the app directory
define('ROOT_DIR', dirname(__FILE__));

// Root for the app directory
define('APP_ROOT', ROOT_DIR . '/app/');

// Root for the app directory
define('VIEW_ROOT', ROOT_DIR . '/Views/');

// Root for the public directory
define('PUBLIC_ROOT', ROOT_DIR . '/public');

// Public URL
define('URL', 'http://beta.test/myMVC/');
define('ASSETS_URL', 'http://beta.test/myMVC/public/');

//define('CONTROLLER_NAMESPACE', '\Controllers');
//define('DEFAULT_CONTROLLER', 'Home');

// Database params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mvc');

// Root for the upload directory
define('UPLOAD_ROOT', PUBLIC_ROOT.'/uploads');

// Cookie expiry time in seconds
define("COOKIE_EXPIRY", 7 * 86400);

// Start session
session_start();

// ONCE WE START USING COMPOSER, COMMENT OUT THE FOLLOWING LINE
// require_once ROOT_DIR. '/vendor/autoload.php';

// Autoload classes
spl_autoload_register(function ($class) {
    //$prefix = 'App\\';
    $base_dir = ROOT_DIR . '/';

    //echo '<br />classname: ['. $class.']<br />';

    $relative_class = $class;
    // Does the class use the App namespace prefix?
    //if (strncmp($prefix, $class, strlen($prefix)) === 0) {
        // remove App prefix
    //    $relative_class = substr($class, strlen($prefix));
    //}
    
    // map the class to the file, to include it
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    //echo '<br />class file: ['. $file.']';
    if (file_exists($file)) {
        require $file;
    } else {
        // the class does not exists, one possibility is that the class has a non directory namespace prefix
        // App\Helpers\Utilities - Helpers is not a directory but a prefix to group helper classes together
        // we need to remove the prefix/group namespace
        //$relative_class = substr($class, strlen($prefix)); // Helpers\Utilities
        $class_pieces = explode('\\', $relative_class); // Utilities
        if(count($class_pieces) > 1){
            $class_file = array_pop($class_pieces); // remove the first element, which is the Helpers
            $file = $base_dir . str_replace('\\', '/', $class_file) . '.php';

            require $file;
        }    
    }
    
});
