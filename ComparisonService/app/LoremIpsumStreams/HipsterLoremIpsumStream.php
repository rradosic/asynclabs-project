<?php

namespace App\LoremIpsumStreams;

use App\LoremIpsumStreams\Traits\HasName;

class HipsterLoremIpsumStream implements LoremIpsumStreamInterface
{
    use HasName;

    function __construct()
    {
        $this->name = "Hipster Ipsum";
    }

    public function getText(): string
    {
        $response = file_get_contents('https://hipsum.co/api/?type=hipster-centric&paras=5');
        $paragraphsArray = json_decode($response, true);

        $fullText = "";

        foreach ($paragraphsArray as $key => $paragraph) {
            $fullText .= $paragraph;
        }

        return $fullText;
    }
}
