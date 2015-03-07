<?php

use ThreeAccents\Packages\CommandBus\CommandTranslator;

class CommandTranslatorTest extends TestCase
{
    /**
     * @var CommandTranslator
     */
    private $commandTranslator;

    public function setUp()
    {
        $this->commandTranslator = new CommandTranslator();
    }

    /** @test */
    public function should_translate_user_register_command_to_user_register_command_handler()
    {
        $command = new UserRegisterStubCommand;

        $handler = $this->commandTranslator->translate($command);

        $this->assertEquals('UserRegisterStubCommandHandler', $handler);
    }

    /** @test */
    public function should_throw_handler_not_found_exception_if_handler_does_no_exist()
    {
        $command = new UserRegisterCommand;

        $this->setExpectedException('ThreeAccents\Packages\CommandBus\Exceptions\HandlerNotFoundException');

        $this->commandTranslator->translate($command);
    }
}

class UserRegisterCommand{}
class UserRegisterStubCommand{}
class UserRegisterStubCommandHandler{}