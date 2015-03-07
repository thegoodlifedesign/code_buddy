<?php namespace ThreeAccents\Packages\CommandBus\Contracts;


interface CommandTranslator
{
    public function translate($command);
}