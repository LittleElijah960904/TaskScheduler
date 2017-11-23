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

    public function replaceIntoExpression($postion, $value)
    {
        $value = (array) $value;

        $expression = explode(' ', $this->expression);

        array_splice($expression, $postion - 1, 1, $value);

        $expression = array_slice($expression, 0, 5);

        return $this->cron(implode(' ', $expression));
    }
}
