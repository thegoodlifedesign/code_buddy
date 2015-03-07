<?php namespace ThreeAccents\Packages\CommandBus;

use ThreeAccents\Packages\CommandBus\Contracts\CommandTranslator as CommandTranslatorInterface;
use ThreeAccents\Packages\CommandBus\Exceptions\HandlerNotFoundException;

class CommandTranslator implements CommandTranslatorInterface{

    /**
     * Get the command and call its prospective handler
     *
     * @param $command
     * @return mixed
     * @throws HandlerNotFoundException
     */
    public function translate($command)
    {
        $commandClass = get_class($command);

        $handler = str_replace("Command","CommandHandler",str_replace("Commands", "Handlers", $commandClass));

        if( ! class_exists($handler))
        {
            $message = "Command handler [$handler] not found";

            throw new HandlerNotFoundException($message);
        }

        return $handler;

    }
}