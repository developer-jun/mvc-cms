<?php

namespace App\Helpers;
use App\Interfaces\LoggerInterface;

class CommentLogger implements LoggerInterface {
  private array $logs;

  public function __construct() {
    $this->logs = [];
    //echo '<!-- Comment Logger -->';
  }

  public function addLog(string | object $data): void {
    //echo '<!--'. $data .'-->';

    $this->logs[] = [
      'key' => time(),
      'data' => $data
    ];
  }

  public function log(string | object $data): void {
    $log_data = $data;
    if(is_object($data)) {
        $log_data = print_r($data, true);
    }
    
    echo '<!--'.'['. microtime() .']: '. $log_data .'-->';

    // $this->logs[] = $data;
  }

  public function showLogs(): void {
    echo '<strong>Logs currently has ['. count($this->logs) .'] item(s)</strong><br />';
    echo '<pre>';
    foreach($this->logs as $log) {
      $data = print_r($log['data'], true);
      echo '['. $log['key'] .']: '. $data . "\r\n";
    }
    echo '</pre>';
  }
}