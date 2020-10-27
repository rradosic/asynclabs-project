<?php

namespace App\LoremIpsumStreams;

use App\LoremIpsumStreams\Traits\HasName;

class SkateLoremIpsumStream implements LoremIpsumStreamInterface
{
    use HasName;

    function __construct()
    {
        $this->name = "Skate Ipsum";
    }

    public function getText(): string
    {
        $response = file_get_contents('http://skateipsum.com/get/5/0/JSON');
        $paragraphsArray = json_decode($response, true);

        $fullText = "";

        foreach ($paragraphsArray as $key => $paragraph) {
            $fullText .= $paragraph;
        }

        return $fullText;
    }
}
