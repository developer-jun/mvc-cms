<?php

namespace App\Helpers;

class InlineLogger implements Logger {
  public function log(string $message): void {
    echo $message;
  }
}