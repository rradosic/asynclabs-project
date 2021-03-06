<?php

namespace App\LoremIpsumStreams;

use App\LoremIpsumStreams\Traits\HasName;

class MetaphoreLoremIpsumStream extends BaseLoremIpsumStream
{
    function __construct()
    {
        $this->name = "Metaphore Ipsum";
    }

    public function getText(): string
    {
        $response = file_get_contents('http://metaphorpsum.com/paragraphs/5');

        return strval($response);
    }
}
