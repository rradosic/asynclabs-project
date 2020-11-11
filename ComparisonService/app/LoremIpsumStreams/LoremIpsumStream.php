<?php

namespace App\LoremIpsumStreams;

interface LoremIpsumStream
{
    /**
     * Returns text of the stream
     *
     * 
     * @return string Text of multiple sentences separated with standard characters (!, ., ?)
     */
    public function getText(): string;

    /**
     * Returns the name of the stream
     *
     * @return string
     */
    public function getName(): string;
}
