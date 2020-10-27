<?php

namespace App\LoremIpsumStreams\Traits;

trait HasName
{
    private $name;

    public function getName(): string
    {
        return $this->name;
    }
}
