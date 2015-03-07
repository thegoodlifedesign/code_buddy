<?php

class DispatcherTest extends TestCase
{
    /**
     * @var \ThreeAccents\Packages\Events\Dispatcher
     */
    private $dispatcher;

    public function setUp()
    {
        $this->dispatcher = new \ThreeAccents\Packages\Events\Dispatcher();
    }

    /** @test */
    public function should_assign_listeners()
    {
        $this->assertEquals(0, count($this->dispatcher->getListeners('EventStub')));

        $this->dispatcher->assignListener('EventStub', new ListenerStub);

        $this->assertEquals(1, count($this->dispatcher->getListeners('EventStub')));
    }

    /** @test */
    public function should_return_null_when_event_is_not_assigned()
    {
        $this->assertEquals([], $this->dispatcher->getListeners('EventStub'));
    }

    /** @test */
    public function should_fire_off_event_listeners()
    {
        $this->dispatcher->assignListener('EventStub', new ListenerStub);
    }

    /** @test */
    public function should_get_events_name()
    {
        $event_name = $this->dispatcher->getEventName(new EventStub);

        $this->assertEquals('EventStub', $event_name);
    }
}

class ListenerStub implements \ThreeAccents\Packages\Events\Contracts\Listener{

    public function handle($event)
    {
        // TODO: Implement handle() method.
    }
}
class EventStub{}