<?php

namespace App\Scheduler;

use Carbon\Carbon;
use Cron\CronExpression;
use App\Scheduler\Frequencies;

abstract class Event
{
    use Frequencies;
    // default expression * * * * *
    public $expression = '* * * * *';

    abstract public function handle();

    public function isDueToRun(Carbon $date)
    {
        return CronExpression::factory($this->expression)->isDue($date);
    }
}
