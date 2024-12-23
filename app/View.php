<?php
namespace App;

class View {
    protected $templatePath;
    protected $data = [];

    // Constructor to set the template path
    public function __construct($templatePath) {
        $this->templatePath = VIEW_ROOT . $templatePath;
    }

    // Set data for the view
    public function setData(array $data) {
        $this->data = array_merge($this->data, $data);
    }

    // Render the template with the data
    public function render() {
        // Extract the data array into variables
        extract($this->data);

        // Check if the template file exists
        if (file_exists($this->templatePath)) {
            // Include the template file; variables are available inside it
            include $this->templatePath;
        } else {
            // Handle missing template file
            throw new Exception("Template file '{$this->templatePath}' not found.");
        }
    }

    // Helper function for including partials
    public static function partial($partialPath, $data = []) {
        // Extract the data so it can be used inside the partial
        extract($data);
        // Ensure the partial file exists
        if (file_exists($partialPath)) {
            include $partialPath;
        } else {
            throw new Exception("Partial file '{$partialPath}' not found.");
        }
    }

    // Static helper method for quick rendering
    public static function creator($templatePath, array $data = []) {
        $view = new self($templatePath);
        $view->setData($data);
        $view->render();
    }
}
