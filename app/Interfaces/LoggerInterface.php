<?php
namespace App\Interfaces;

interface LoggerInterface {
    public function addLog(string | object $message): void; // add log to variable $logs 
    public function log(string | object $message): void; // do the logging right away
    public function showLogs(): void; // show the content of variable $logs
}