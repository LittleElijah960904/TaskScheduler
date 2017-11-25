<?php

use Carbon\Carbon;
use App\Scheduler\Kernel;
use App\Events\SomeEvent;

require_once 'vendor/autoload.php';


// $event = new SomeEvent();
// $event->cron('some cron expression');
//
// var_dump($event->expression);


// $kernel = new Kernel;
//
// $kernel->add(new SomeEvent)->monthly();
//
// $kernel->run();

$kernel = new Kernel;
// $kernel->setDate(Carbon::create(2017, 10, 1, 0, 0, 0));
$kernel->setDate(Carbon::now()->tz('Europe/London'));

$kernel->add(new SomeEvent())->everyMinute();

$kernel->run();
