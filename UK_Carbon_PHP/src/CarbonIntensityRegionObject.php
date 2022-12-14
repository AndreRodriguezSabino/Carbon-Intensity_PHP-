<?php

declare(strict_types=1);

namespace Andre\CarbonIntensity;

use Andre\CarbonIntensity\CarbonIntensityRegionalResponse;

class CarbonIntensityRegionObject extends CarbonIntensityDataObject
{

    protected array $regionArray;
    protected int $regionid;
    protected string $dnoregion;
    protected string $shortname;
    protected string $postcode;
    protected array $intensity;
    protected int $forecast;
    protected string $index;
    protected array $generationmix;
    protected float $gas;
    protected float $coal;
    protected float $biomass;
    protected float $nuclear;
    protected float $hydro;
    protected float $imports;
    protected float $other;
    protected float $wind;
    protected float $solar;

    /*
      {
      "data": [
      {
      "from": "2021-07-18T14:00Z",
      "to": "2021-07-18T14:30Z",
      "regions": [
      {
      "regionid": 1,
      "dnoregion": "Scottish Hydro Electric Power Distribution",
      "shortname": "North Scotland",
      "intensity": {
      "forecast": 27,
      "index": "very low"
      },
      "generationmix": [
      {
      "fuel": "biomass",
      "perc": 2.8
      },
      {
      "fuel": "coal",
      "perc": 0
      },
      {
      "fuel": "imports",
      "perc": 0
      },
      {
      "fuel": "gas",
      "perc": 5.9
      },
      {
      "fuel": "nuclear",
      "perc": 35.1
      },
      {
      "fuel": "other",
      "perc": 0
      },
      {
      "fuel": "hydro",
      "perc": 7.6
      },
      {
      "fuel": "solar",
      "perc": 4.1
      },
      {
      "fuel": "wind",
      "perc": 44.5
      }
      ]
      },
      [..]
     */

    public function __construct(
        array $regionArray,
        CarbonIntensityRegionalResponse $parentObject,
        bool $hasDataArray = false,
        bool $getDataFromFirstKey = true
    ) {
        //var_dump($carbonIntensityResponse);
        unset($this->dataArray);
        $this->regionArray = $regionArray;
        unset($this->actual);

        //$this->regionsArray = $parentObject["regions"];
        unset($this->regionsArray);

        if ($getDataFromFirstKey) {
            //$getDataFromFirstKey
            //regional/intensity/2022-08-26T11:30Z/fw24h/postcode/RG10
            //doesn't have data in first key of $this->dataArray[0]
            //doesn't have "from" in the parent array
            $this->from = $parentObject->get("from");
            $this->to = $parentObject->get("to");
        } else {
            $this->from = $regionArray["from"];
            $this->to = $regionArray["to"];
        }


        if ($hasDataArray == true) {
            // /regional/england has data array
            $this->regionid = $parentObject->get("regionid");
            if ($parentObject->exists("dnoregion")) {
                $this->dnoregion = $parentObject->get("dnoregion");
            }
            $this->shortname = $parentObject->get("shortname");
            if ($parentObject->exists('postcode')) {
                $this->postcode = $parentObject->get("postcode");
            }
        } else {
            $this->regionid = $this->regionArray["regionid"];
            $this->dnoregion = $this->regionArray["dnoregion"];
            $this->shortname = $this->regionArray["shortname"];
        }
        $this->intensity = $this->regionArray["intensity"];
        $this->forecast = $this->intensity["forecast"];
        $this->index = $this->intensity["index"];

        $this->generationmix = $this->regionArray["generationmix"];
        foreach ($this->generationmix as $val) {
            switch ($val["fuel"]) {
                case 'gas':
                    $this->gas = $val["perc"];
                    break;
                case 'coal':
                    $this->coal = $val["perc"];
                    break;
                case 'biomass':
                    $this->biomass = $val["perc"];
                    break;
                case 'nuclear':
                    $this->nuclear = $val["perc"];
                    break;
                case 'hydro':
                    $this->hydro = $val["perc"];
                    break;
                case 'imports':
                    $this->imports = $val["perc"];
                    break;
                case 'other':
                    $this->other = $val["perc"];
                    break;
                case 'wind':
                    $this->wind = $val["perc"];
                    break;
                case 'solar':
                    $this->solar = $val["perc"];
                    break;
                default:
                    exit(sprintf("Unknown fuel type: %s", $val["fuel"]));
                    break;
            }
        }
    }
}
