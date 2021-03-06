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

$router->get('/streamComparisonReport', 'ReportController@show');

$router->get('/health', function () use ($router) {
    return response()->json(["status"=>"Still Alive"]);
});
