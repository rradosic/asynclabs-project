<?php

namespace App\Jobs;

use App\LoremIpsumStreams\CorporateLoremIpsumStream;
use App\LoremIpsumStreams\HipsterLoremIpsumStream;
use App\LoremIpsumStreams\MetaphoreLoremIpsumStream;
use App\LoremIpsumStreams\SkateLoremIpsumStream;
use App\StreamComparer;
use App\VowelStreamComparer;
use Illuminate\Support\Facades\Cache;

class CompareStreams extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(StreamComparer $streamComparer)
    {
        $skateStream = new SkateLoremIpsumStream();
        $corporateStream = new CorporateLoremIpsumStream();
        $hipsterStream = new HipsterLoremIpsumStream();
        $metaphoreStream = new MetaphoreLoremIpsumStream();

        //Should probably have a StreamSet class but this is good enough for just two sets, data could also be a class
        $firstSetData = Cache::get("firstSetData");
        $secondSetData = Cache::get("secondSetData");

        if (empty($firstSetData)) $firstSetData = $this->initializeSetDataArray($skateStream->getName(), $corporateStream->getName());
        if (empty($secondSetData)) $secondSetData = $this->initializeSetDataArray($metaphoreStream->getName(), $hipsterStream->getName());

        $firstSetResult = $streamComparer::compareStreams($skateStream, $corporateStream);
        $secondSetResult = $streamComparer::compareStreams($metaphoreStream, $hipsterStream);

        $firstSetData["values"][0] += $firstSetResult[0];
        $firstSetData["values"][1] += $firstSetResult[1];
        $secondSetData["values"][0] += $secondSetResult[0];
        $secondSetData["values"][1] += $secondSetResult[1];

        Cache::put("firstSetData", $firstSetData);
        Cache::put("secondSetData", $secondSetData);

        Cache::increment("comparisonsDone");
    }

    private function initializeSetDataArray($firstName, $secondName)
    {
        return [
            "names" => [$firstName, $secondName],
            "values" => [0, 0]
        ];
    }
}
