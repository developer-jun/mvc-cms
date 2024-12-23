<?php
namespace App\Helpers;
class TimeTracker {
    
    public function __construct(
      private $startTime = 0,
      private $endTime = 0,
    ){}

    // Record the start time
    public function start() {
        $this->startTime = microtime(true);
    }

    public function get_start_time(): float {
        return $this->startTime;
    }

    // Record the end time
    public function end() {
        $this->endTime = microtime(true);
    }

    public function get_end_time(): float {
        return $this->endTime;
    }

    // Calculate the difference between start and end time
    public function getDuration(): float {
        if ($this->startTime === null || $this->endTime === null) {
            throw new Exception("Start time or end time is not set.");
        }

        $duration = $this->endTime - $this->startTime;

        // Return the duration in seconds (can be modified to return other units)
        return $duration;
    }
}
