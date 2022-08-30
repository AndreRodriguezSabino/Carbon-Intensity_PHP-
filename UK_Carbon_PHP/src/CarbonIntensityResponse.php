<?php

declare(strict_types=1);

namespace Andre\CarbonIntensity;

use GuzzleHttp\Psr7\Response;
use Andre\CarbonIntensity\CarbonIntensityDataObject;
use Andre\CarbonIntensity\CarbonIntensityStatsObject;
use Andre\CarbonIntensity\CarbonIntensityGenerationMixObject;

class CarbonIntensityResponse
{

    protected string $dataRaw = "";
    //array or CarbonIntensityRegionsListObject
    protected array $data = [];
    protected int $statusCode;
    protected string $statusMessage;

    public function __construct(
        $carbonIntensityResponse,
        string $objectType = 'CarbonIntensityDataObject',
        bool $dataIsArray = true
    ) {
        //var_dump($carbonIntensityResponse);
        $this->dataRaw = $carbonIntensityResponse->getBody()->getContents();
        $JSONArray = json_decode($this->dataRaw, true);
        //var_dump($JSONArray);
        if (array_key_exists("error", $JSONArray)) {
            /*
              {
              "error": {
              "code": "400 Bad Request",
              "message": "Please enter a valid date in ISO8601 format
              YYYY-MM-DD and period 1-48 e.g. /intensity/date/2017-08-25/42"
              }
              }
             */
            exit(sprintf(
                "error %s: %s\n",
                $JSONArray["error"]["code"],
                $JSONArray["error"]["message"]
            ));
        }
        $this->statusCode = $carbonIntensityResponse->getStatusCode();
        $this->statusMessage = $carbonIntensityResponse->getReasonPhrase();

        $methodName = 'prepare' . $objectType;
        if ($dataIsArray == false) {
            // getGeneration(): /generation endpoint returns a single item, not an array
            array_push($this->data, $this->$methodName($JSONArray["data"]));
        } else {
            foreach ($JSONArray["data"] as $value) {
                //call $functionName as method
                array_push($this->data, $this->$methodName($value));
            }
        }
    }

    private function prepareCarbonIntensityDataObject($value): CarbonIntensityDataObject
    {
        $obj = new CarbonIntensityDataObject($value);
        return $obj;
    }

    private function prepareCarbonIntensityStatsObject($value): CarbonIntensityStatsObject
    {
        $obj = new CarbonIntensityStatsObject($value);
        return $obj;
    }

    private function prepareCarbonIntensityGenerationMixObject($value): CarbonIntensityGenerationMixObject
    {
        $obj = new CarbonIntensityGenerationMixObject($value);
        return $obj;
    }

    private function prepareCarbonIntensityFactorsObject($value): CarbonIntensityFactorsObject
    {
        $obj = new CarbonIntensityFactorsObject($value);
        return $obj;
    }

    public function get(string $key, string $returntype = "array")
    {

        $tmpString = $this->$key;

        if ($returntype == "array") {
            return $tmpString;
        } elseif ($returntype == "json") {
            $jsonArray = json_encode($tmpString);
            return $jsonArray;
        }
    }

    public function exists(string $key): bool
    {
        return isset($this->$key);
    }

    public function set(string $key, $value)
    {
        $this->$key = $value;
        return true;
    }

    public function getMultiple(array $keys, string $returntype = "array")
    {
        $tmpArray = [];
        foreach ($keys as $key) {
            $tmpArray["$key"] = $this->$key;
        }

        if ($returntype == "array") {
            return $tmpArray;
        } elseif ($returntype == "json") {
            $jsonArray = json_encode($tmpArray);
            return $jsonArray;
        }
    }

    public function setMultiple(array $keyValuePairs)
    {
        foreach ($keyValuePairs as $key => $value) {
            $this->$key = $this->$value;
        }
    }

    public function getAll(string $returntype = "array")
    {
        $keyValuePairs = get_object_vars($this);
        ksort($keyValuePairs);

        if ($returntype == "array") {
            return $keyValuePairs;
        } elseif ($returntype == "json") {
            $KeyValuePairsJSON = json_encode($keyValuePairs);
            return $KeyValuePairsJSON;
        }
    }
}
