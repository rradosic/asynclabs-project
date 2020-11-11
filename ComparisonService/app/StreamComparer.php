<?php

namespace App;

use App\LoremIpsumStreams\LoremIpsumStream;

interface StreamComparer
{
    public static function compareStreams(LoremIpsumStream $firstStream, LoremIpsumStream $secondStream);
}
