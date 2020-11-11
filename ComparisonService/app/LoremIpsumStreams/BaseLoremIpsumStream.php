<?php

namespace App\LoremIpsumStreams;

abstract class BaseLoremIpsumStream implements LoremIpsumStream
{
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public abstract function getText(): string;

}
