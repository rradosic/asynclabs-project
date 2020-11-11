<?php

namespace App\LoremIpsumStreams;

abstract class BaseLoremIpsumStream implements LoremIpsumStream
{
    protected string $name = 'Base Lorem Stream';

    public function getName(): string
    {
        return $this->name;
    }

    public abstract function getText(): string;

}
