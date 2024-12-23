<?php
namespace App;

use App\Logger;

class Template {
    private $layout_template_path; // base path for layout templates
    private $template; // name of the template to be rendered
    private $data; // data to be passed to the template
    private $logger; // action logger, to be injected

    // practicing dependency injection
    public function __construct($template, $data, $logger, $template_path = '') {        
        $this->template = $template;
        $this->data = $data;
        $this->layout_template_path = $template_path . '/layout';

        $this->logger = $logger;
    }

    // Render the template including the current page content.
    public function render($content_data) {   
        // merge $content_data with existing $this->data to avoid, the order matters as we can override existing variable from $this->data with $content_data
        // this is extra work but necessary to allow array same key/variable override before calling the extract function
        $content_data = array_merge($this->data, $content_data);        
        extract($content_data); // convert array key pairs to local variables
        
        ob_start();
        if ($content_file) {
            require $content_file;
        }
        $content = ob_get_clean();

        //echo $this->template;
        // check if $template is set inside $content_file, if so, use that template
        if (isset($template) && file_exists($template)) {
            $this->template = $template;
            $this->logger->logMessage('Template File Found: '. $template);
        }
        
        require $this->template; // Render the main template
    }

    public function renderPartial($partial_file, $partial_data = []) {
        $partial_data = array_merge($this->data, $partial_data);
        extract($partial_data);
        $template_file = $this->layout_template_path . '/' . $partial_file;
        if(file_exists($template_file)){
            $this->logger->logMessage('Including Template File: '. $template_file);
            require $template_file;
        } else {
            //$this->logger->logMessage('Template File NOT Found: '. __DIR__.$template_file);
        }
    }
}