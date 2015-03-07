<?php namespace ThreeAccents\Packages\CommandBus\Contracts;

interface CommandBus
{
    public function execute($command);
}