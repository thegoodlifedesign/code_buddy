<?php namespace spec\ThreeAccents\Packages\CommandBus;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ThreeAccents\Packages\CommandBus\CommandTranslator;

class CommandBusSpec extends ObjectBehavior
{
    function let(Request $request, CommandTranslator $translator, Application $app)
    {
        $this->beConstructedWith($request, $translator, $app);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ThreeAccents\Packages\CommandBus\CommandBus');
    }

    function it_handles_a_command(Application $app, CommandStub $command, CommandTranslator $translator, CommandHandlerStub $handler)
    {
        $translator->translate($command)->willReturn('CommandHandler');
    }

}

class CommandStub{}
class CommandHandlerStub
{
    public function handle()
    {
        return 'hey';
    }
}

