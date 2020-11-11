<?php

namespace App\LoremIpsumStreams;

use App\LoremIpsumStreams\Traits\HasName;

class CorporateLoremIpsumStream extends BaseLoremIpsumStream
{
    function __construct()
    {
        $this->name = "Corporate Ipsum";
    }

    public function getText(): string
    {
        $response = file_get_contents('https://corporatelorem.kovah.de/api/5?paragraphs=true');
        $jsonResponse = json_decode($response);

        $fullText = "";

        foreach ($jsonResponse->paragraphs as $key => $paragraph) {
            $fullText .= $paragraph;
        }

        return $fullText;
    }
}
