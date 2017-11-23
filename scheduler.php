<?php

use App\Events\SomeEvent;

require_once 'vendor/autoload.php';

$event = new SomeEvent();
// $event->cron('some cron expression');
//
// var_dump($event->expression);
