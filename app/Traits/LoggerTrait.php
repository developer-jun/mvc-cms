<?php
namespace App\Traits;

trait LoggerTrait {
    private $logger;

	// We use an Interface for the argument
    public function setLogger(LoggerInterface $logger): void {
        $this->logger = $logger;
    }

    protected function logMessage(string $message): void {
        if ($this->logger) {
            $this->logger->logMessage($message);
        } else {
            // Handle case where logger is not set, or use a default logger
        }
    }
}
