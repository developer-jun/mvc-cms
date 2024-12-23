<?php
namespace App\Helpers;

class FileLogger implements LoggerInterface {
  public function log(string $message) {
    file_put_contents('log.txt', $message . PHP_EOL, FILE_APPEND);
  }
}