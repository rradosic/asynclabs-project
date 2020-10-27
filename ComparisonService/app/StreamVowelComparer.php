<?php

namespace App;

//Could implement an interface but its assumed there will be only one comparison strategy
class StreamVowelComparer
{


    /**
     * Compares streams based on how many vowels they have
     *
     * @param LoremIpsumStreams\LoremIpsumStreamInterface $firstStream
     * @param LoremIpsumStreams\LoremIpsumStreamInterface $secondStream
     * @param int $wordOffset=5 Offset to use for comparison
     * @return array Structure [0]=> First stream, [1]=> Second stream
     */
    public static function compareStreams($firstStream, $secondStream, $wordOffset = 5)
    {
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
