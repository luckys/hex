<?php

namespace Ob\Hex\Tests\Domain;

use Mockery as m;
use Ob\Hex\Domain\Event;

/**
 * @covers Ob\Hex\Domain\Event
 */
class EventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \DateTimeImmutable
     */
    private $startDate;

    /**
     * @var \DateTimeImmutable
     */
    private $endDate;

    /**
     * @var \Ob\Hex\Domain\Email
     */
    private $organizer;

    /**
     * @var Event
     */
    private $event;

    protected function setUp()
    {
        $this->startDate = new \DateTimeImmutable();
        $this->endDate   = new \DateTimeImmutable();
        $this->organizer = m::mock('Ob\Hex\Domain\Email');

        $this->event = new Event($this->startDate, $this->endDate, $this->organizer);
    }

    public function testCanBeCreated()
    {
        $organizer = m::mock('Ob\Hex\Domain\Email');

        $this->assertInstanceOf(Event::class, new Event(new \DateTimeImmutable(), new \DateTimeImmutable(), $organizer));
    }

    public function testStartDateCanBeRetrieved()
    {
        $this->assertEquals($this->startDate, $this->event->getStartDate());
        $this->assertInstanceOf('DateTimeImmutable', $this->event->getStartDate());
    }

    public function testEndDateCanBeRetrieved()
    {
        $this->assertEquals($this->endDate, $this->event->getEndDate());
        $this->assertInstanceOf('DateTimeImmutable', $this->event->getStartDate());
    }
}
