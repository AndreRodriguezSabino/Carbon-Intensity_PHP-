<?php

declare(strict_types=1);

namespace Andre\CarbonIntensity;

use GuzzleHttp\Psr7\Response;
use Andre\CarbonIntensity\CarbonIntensityRegionObject;

class CarbonIntensityRegionalResponse extends CarbonIntensityResponse
{
    protected string $from;
    protected string $to;
    protected array $subDataArray;
    protected array $regionsArray;
    protected array $regions = [];
    protected int $regionid;
    protected string $dnoregion;
    protected string $shortname;
    protected string $postcode;

    public function __construct(
        $carbonIntensityResponse,
        bool $hasDataArray = true,
        bool $getDataFromFirstKey = true
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

        $this->dataArray = $JSONArray["data"];
        //var_dump($JSONArray["data"]);
        //exit("dump JSONArray[data]");
        //unset($this->data);

        if ($hasDataArray == true) {
            //if it has data array (/regional/england)
            if ($getDataFromFirstKey) {
                $this->regionid = $this->dataArray[0]["regionid"];
                if (array_key_exists('dnoregion', $this->dataArray[0])) {
                    $this->dnoregion = $this->dataArray[0]["dnoregion"];
                }
                $this->shortname = $this->dataArray[0]["shortname"];

                if (array_key_exists('postcode', $this->dataArray[0])) {
                    $this->postcode = $this->dataArray[0]["postcode"];
                }

                $this->subDataArray = $this->dataArray[0]["data"];
                $this->from = $this->subDataArray[0]["from"];
                $this->to = $this->subDataArray[0]["to"];

                foreach ($this->subDataArray as $value) {
                    //call $functionName as method
                    $CIRegionObject = new CarbonIntensityRegionObject($value, $this, $hasDataArray, $getDataFromFirstKey);
                    array_push($this->data, $CIRegionObject);
                }
            } else {
                //$getDataFromFirstKey
                //regional/intensity/2022-08-26T11:30Z/fw24h/postcode/RG10
                //doesn't have data in first key of $this->dataArray[0]
                $this->regionid = $this->dataArray["regionid"];
                if (array_key_exists('dnoregion', $this->dataArray)) {
                    $this->dnoregion = $this->dataArray["dnoregion"];
                }
                $this->shortname = $this->dataArray["shortname"];

                if (array_key_exists('postcode', $this->dataArray)) {
                    $this->postcode = $this->dataArray["postcode"];
                }

                $this->subDataArray = $this->dataArray["data"];
                //$this->from = $this->subDataArray["from"];
                //$this->to = $this->subDataArray["to"];

                foreach ($this->subDataArray as $value) {
                    //call $functionName as method
                    $CIRegionObject = new CarbonIntensityRegionObject($value, $this, $hasDataArray, $getDataFromFirstKey);
                    array_push($this->data, $CIRegionObject);
                }
            }
        } else {
            //if it has regions array:
            unset($this->data);
            unset($this->subDataArray);
            $this->regionsArray = $this->dataArray[0]["regions"];
            $this->from = $this->dataArray[0]["from"];
            $this->to = $this->dataArray[0]["to"];

            //var_dump($this->regionsArray);
            //exit();
            foreach ($this->regionsArray as $value) {
                //call $functionName as method
                $CIRegionObject = new CarbonIntensityRegionObject($value, $this);
                array_push($this->regions, $CIRegionObject);
            }
        }
        //var_dump($this->regions);
        //exit();
    }
}
