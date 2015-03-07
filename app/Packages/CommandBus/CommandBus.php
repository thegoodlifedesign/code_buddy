<?php namespace ThreeAccents\Packages\CommandBus;

use Illuminate\Foundation\Application;
use InvalidArgumentException;
use Illuminate\Http\Request;
use ThreeAccents\Packages\CommandBus\Contracts\CommandBus as CommandBusInterface;

class CommandBus
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * List of optional decorators for command bus.
     *
     * @var array
     */
    protected $decorators = [];

    /**
     * all of the commands constructor
     *
     * @var array
     */
    protected $dependencies = [];

    /**
     * @var CommandTranslator
     */
    protected $commandTranslator;

    /**
     * @var Application
     */
    protected  $app;

    /**
     * @param Request $request
     * @param CommandTranslator $commandTranslator
     * @param Application $app
     */
    function __construct(Request $request, CommandTranslator $commandTranslator, Application $app)
    {
        $this->request = $request;
        $this->commandTranslator = $commandTranslator;
        $this->app = $app;
    }

    /**
     * execute the command
     *
     * @param $command
     * @return mixed
     * @throws Exceptions\HandlerNotFoundException
     */
    public function execute($command)
    {
        $this->executeDecorators($command);

        $handler = $this->commandTranslator->translate($command);

        return app($handler)->handle($command);
    }

    /**
     * Fire off a command
     *
     * @param $command
     * @param array $input
     * @param array $decorators
     * @return mixed
     */
    public function dispatch($command, array $input = null, $decorators = [])
    {
        $input = $input ?: $this->request->all();

        $command =  $this->mapInputToCommand($command, $input);

        $this->setDecorators($decorators);

        return $this->execute($command);
    }

    /**
     * Match a input name value
     * to a command property
     *
     * @param $command
     * @param array $input
     * @return object
     */
    protected function mapInputToCommand($command, array $input)
    {
        $reflector = new \ReflectionClass($command);

        foreach($reflector->getConstructor()->getParameters() as $parameter)
        {
            $name = $parameter->getName();

            if(array_key_exists($name, $input))
            {
                $this->dependencies[] = $input[$name];
            }
            elseif($parameter->isDefaultValueAvailable())
            {
                $this->dependencies[] = $parameter->getDefaultValue();
            }
            else
            {
                throw new InvalidArgumentException("Unable to map input to command: {$name}");
            }
        }

        return $reflector->newInstanceArgs($this->dependencies);
    }

    /**
     *
     *
     * @param $decorators
     */
    protected function setDecorators($decorators)
    {
        foreach($decorators as $decorator) {
            $this->decorators[] = $decorator;
        }
    }

    /**
     * Execute all of the decorators wrapping
     * the command
     *
     * @param $command
     */
    protected function executeDecorators($command)
    {
        foreach($this->decorators as $className) {
            $instance = $this->app->make($className);

            if(!$instance instanceof CommandBusInterface) {
                $message = 'The class decorating the command bus must implement the CommandBusInterface';

                throw new InvalidArgumentException($message);
            }

            $instance->execute($command);
        }
    }
}