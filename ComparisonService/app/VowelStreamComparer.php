<?php

namespace App;

use App\LoremIpsumStreams\LoremIpsumStream;

class VowelStreamComparer implements StreamComparer
{
    /**
     * Compares streams based on how many vowels they have
     *
     * @param App\LoremIpsumStreams\LoremIpsumStream $firstStream
     * @param App\LoremIpsumStreams\LoremIpsumStream $secondStream
     * @param int $wordOffset=5 Offset to use for comparison
     * @return array Structure [0]=> First stream, [1]=> Second stream
     */

    public static function compareStreams(LoremIpsumStream $firstStream, LoremIpsumStream $secondStream)
    {
        $wordOffset = 5;

        $firstText = explode(" ", $firstStream->getText());
        $secondText = explode(" ", $secondStream->getText());

        $firstTextWordCount = count($firstText);
        $secondTextWordCount = count($secondText);

        $lowestCount = min($firstTextWordCount, $secondTextWordCount);

        $vowelCount = [];

        $vowelCount[0] = 0;
        $vowelCount[1] = 0;

        for ($i = $wordOffset; $i < $lowestCount; $i += $wordOffset) {
            $vowelCount[0] += preg_match_all('/[aeiou]/i', $firstText[$i]);
            $vowelCount[1] += preg_match_all('/[aeiou]/i', $secondText[$i]);
        }

        return $vowelCount;
    }
}
