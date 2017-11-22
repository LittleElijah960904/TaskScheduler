<?php

use Carbon\Carbon;
use App\Scheduler\Event;
use App\Scheduler\Frequencies;
use PHPUnit\Framework\TestCase;

class FrequenciesTest extends TestCase
{
    /** @test */
    public function can_set_plain_cron_expression()
    {
        $frequencies = $this->frequencies();

        $frequencies->cron('some expression');

        $this->assertEquals($frequencies->expression,'some expression');
    }

    /** @test */
    public function can_set_every_minute()
    {
        $frequencies = $this->frequencies();

        $frequencies->everyMinute();

        $this->assertEquals($frequencies->expression,'* * * * *');
    }

    /** @test */
    public function can_set_every_ten_minutes()
    {
        $frequencies = $this->frequencies();

        $frequencies->everyTenMinutes();

        $this->assertEquals($frequencies->expression,'*/10 * * * *');
    }

    /** @test */
    public function can_set_every_thirty_minutes()
    {
        $frequencies = $this->frequencies();

        $frequencies->everyThirtyMinutes();

        $this->assertEquals($frequencies->expression,'*/30 * * * *');
    }

    protected function frequencies()
    {
      $frequencies = $this->getMockForTrait(Frequencies::class);

      $frequencies->expression = '* * * * *';

      return $frequencies;
    }

}
