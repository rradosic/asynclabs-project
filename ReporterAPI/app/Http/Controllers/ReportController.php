<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Cache;

class ReportController extends Controller
{
    /**
     * Retrieve the stream comparison report
     *
     * @return Response
     */
    public function show()
    {
        $firstSetData = Cache::get("firstSetData");
        $secondSetData = Cache::get("secondSetData");

        if (!empty($firstSetData) && !empty($secondSetData)) {

           $firstSetProccessedData = $this->processSetData($firstSetData);
           $secondSetProccessedData = $this->processSetData($secondSetData);

            return response()->json([
                "success" => true,
                "sets" => [
                    "firstSet" => $firstSetProccessedData,
                    "secondSet" => $secondSetProccessedData,
                ]
            ]);
        } else {
            return response('', 404, [
                "Retry-After" => 60
            ]);
        }
    }

    /**
     * Processes set data and calculates similarity percentage
     *
     * @param array $setData
     * @return array
     */
    private function processSetData($setData):array
    {
        //Index of the larger value
        $firstSetMostVowels = array_keys($setData["values"], max($setData["values"]))[0];
            
        $setData["mostVowels"] = $setData["names"][$firstSetMostVowels];
        
        $setData["similarityPercentage"] = number_format((min($setData["values"])/max($setData["values"]))*100,2);

        return $setData;
    }
}
