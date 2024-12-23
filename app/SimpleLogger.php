<?php

namespace App;

use App\Interfaces\LoggerInterface;

class SimpleLogger implements LoggerInterface {
    public function __construct(
        private string $type = 'file', 
        private string $logFile = '../app.log',
        private array $logs = []) {}

    public function logMessage(string | object $message, callable $callback = null): void {        
        $this->logs[] = [
            'type' => $this->type,
            'data' => $message
        ];
        // check what type of log is currently set
        switch ($this->type) {
            case 'file':
                $result = $this->logMessageToFile($message);
                break;
            case 'comment':
                $result = $this->logMessageToComment($message);
                break;
            case 'inline':
                $result = $this->logMessageInline($message);
                break;
            default:
                $result = $this->logMessageToFile($message);
                break;
        }
        if($callback) {
            $callback($result);
        }
    }
    
    public function showLogs(): void {
        echo '<pre>';
        $counter = 1;
        foreach($this->logs as $log) {
            echo '<br /><br />Event '. $counter++;
            echo '<br />Type: '. $log['type'];
            echo '<br />Data: '. $log['data'];
        }
        echo '</pre>';
    }

    public function printData($message) {
        echo '<!--'. $message .'-->';
    }

    private function logMessageToFile($message): string | null {
        // just in case we get an object
        if(gettype($message) != 'string'){
            $message = print_r($message, true);
        }
        $timestamp = date('Y-m-d H:i:s');
        file_put_contents($this->logFile, "[$timestamp] $message\n", FILE_APPEND);
        return $message;
    }

    private function logMessageInline($message): string | null {
        $message = print_r($message, true);
        return $message;
    }

    private function logMessageToComment($message): string | null {
        //ob_start(); //var_dump($message); //$content = ob_get_clean();
        return '<!--' . print_r($message, true) . '-->';
    }    
}