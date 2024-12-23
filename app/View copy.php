<?php
namespace App;

//use App\Interfaces\LoggerInterface;

class View {    
    public function __construct(
        private string $layout_template,
        private string $page_file,
        private string $template_path,
        private array $data,
        //private LoggerInterface $logger
    ) {}
  
    // Render the template including the current page content.
    public function render() {       
        ob_start();
        require $this->page_file; // PAGE MAIN CONTENT no need to checks, constructor takes care of that
        $content = ob_get_clean();
        
        require $this->layout_template; // Render the Page Template
        //$this->logger->log('successfully rendered: '. $this->page_file);
    }

    // For partial contents or page parts files like: header, sidebar or footer.
    // Can be used by /templates/layout and /templates/pages, check out [=> /templates/layout/page.php]
    public function renderPartial($partial_file, $partial_data = []) {
        $partial_data = array_merge($this->data, $partial_data);
        extract($partial_data);
        $template_file = $this->template_path . $partial_file;
        if(file_exists($template_file)){
            //$this->logger->addLog('Including Template File: '. $template_file);
            require $template_file;
        }
    }
}