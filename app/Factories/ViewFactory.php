<?php
namespace App\Factories;

use App\View;

class ViewFactory {
    public static function createView2(array $template_data, $data): View {

        $layout_template = isset($template_data['template']) && file_exists($template_data['template'])
            ? $template_data['template']
            : 'default';
        $page_file = isset($template_data['page_file']) && file_exists($template_data['page_file'])
            ? $template_data['page_file']
            : $template_data['template_path'] . 'pages/404.php';

        return new View(layout_template: $layout_template, 
            page_file: $page_file, 
            template_path: $template_data['template_path'], 
            data: $data);
    }

    public static function createView(array $template_data, $data): View {
        // Validate required keys
        if (!isset($template_data['template_path'])) {
            throw new InvalidArgumentException('Template path is required.');
        }

        // Determine layout template
        $layout_template = self::validateFile($template_data['template'] ?? null) 
            ? $template_data['template']
            : 'default';

        // Determine page file
        $page_file = self::validateFile($template_data['page_file'] ?? null) 
            ? $template_data['page_file']
            : $template_data['template_path'] . 'pages/404.php';

        return new View(
            layout_template: $layout_template,
            page_file: $page_file,
            template_path: $template_data['template_path'],
            data: $data
        );
    }

    private static function validateFile($file): bool {
        return $file && file_exists($file);
    }
}