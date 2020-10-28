<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Jobs\CompareStreams;
use App\LoremIpsumStreams\CorporateLoremIpsumStream;
use App\LoremIpsumStreams\HipsterLoremIpsumStream;
use App\LoremIpsumStreams\MetaphoreLoremIpsumStream;
use App\LoremIpsumStreams\SkateLoremIpsumStream;
use App\StreamComparisonStrategy;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/streamComparisonReport', function () use ($router) {
    $firstSetData = Cache::get("firstSetData");
    $secondSetData = Cache::get("secondSetData");

    if(!empty($firstSetData) && !empty($secondSetData)){
        //Index of the larger value
        $firstSetMostVowels = array_keys($firstSetData["values"], max($firstSetData["values"]))[0];
        $secondSetMostVowels = array_keys($secondSetData["values"], max($secondSetData["values"]))[0];

        $firstSetData["mostVowels"] = $firstSetData["names"][$firstSetMostVowels];
        $secondSetData["mostVowels"] = $secondSetData["names"][$secondSetMostVowels];

        $firstSetData["similarityPercentage"] = number_format((min($firstSetData["values"])/max($firstSetData["values"]))*100,2);
        $secondSetData["similarityPercentage"] = number_format((min($secondSetData["values"])/max($secondSetData["values"]))*100,2);


        return response()->json([
            "success" => true,
            "sets" => [
                "firstSet" => $firstSetData,
                "secondSet" => $secondSetData,
            ]
        ]);
    }
    else{
        return response('', 503, [
            "Retry-After" => 60
        ]);
    }
    
});

$router->get('/health', function () use ($router) {
    return response()->json(["status"=>"Still Alive"]);
});
