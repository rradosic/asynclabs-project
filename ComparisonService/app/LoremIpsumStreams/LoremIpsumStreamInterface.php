<?php

namespace App\LoremIpsumStreams;

interface LoremIpsumStreamInterface
{
    /**
     * Returns text of the stream
     *
     * @return string
     */
    public function getText(): string;

    /**
     * Returns the name of the stream
     *
     * @return string
     */
    public function getName(): string;
}
