<?php

namespace App\Scheduler;

trait Frequencies
{
    public function cron($expression)
    {
        $this->expression = $expression;

        return $this;
    }

    public function everyMinute()
    {
      // default
      return $this->cron($this->expression);
    }

    public function everyTenMinutes()
    {
      return $this->replaceIntoExpression(1,'*/10');
    }

    public function everyThirtyMinutes()
    {
      return $this->replaceIntoExpression(1,'*/30');
    }

    public function hourlyAt($minute = 1)
    {
      return $this->replaceIntoExpression(1, $minute);
    }

    public function hourly()
    {
      return $this->hourlyAt(1);
    }

    public function dailyAt($hour = 1, $minute = 1)
    {
      return $this->replaceIntoExpression(1, [$minute, $hour]);
    }

    public function daily()
    {
      return $this->dailyAt(0,0);
    }

    public function twiceDaily($firstHour = 1, $lastHour = 12)
    {
      return $this->replaceIntoExpression(1, [0, "{$firstHour},{$lastHour}"]);
    }

    public function replaceIntoExpression($postion, $value)
    {
        $value = (array) $value;

        $expression = explode(' ', $this->expression);

        array_splice($expression, $postion - 1, 1, $value);

        $expression = array_slice($expression, 0, 5);

        return $this->cron(implode(' ', $expression));
    }
}
