<?php

namespace App\Scheduler;

use Carbon\Carbon;
use App\Scheduler\Event;

class Kernel
{
    protected $events = [];

    protected $date;

    public function getEvents()
    {
        return $this->events;
    }

    public function add(Event $event)
    {
      $this->events[] = $event;

      return $event;
    }

    public function run()
    {
        foreach ($this->getEvents() as $event) {
          if (!$event->isDueToRun($this->getDate())) {
            continue;
          }
          $event->handle();
        }
    }

    public function setDate(Carbon $date)
    {
      $this->date = $date;
    }

    public function getDate()
    {
      if (!$this->date) {
        return Carbon::now();
      }
      return $this->date;
    }

}
