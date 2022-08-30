<?php

declare(strict_types=1);

namespace Andre\CarbonIntensity;

class CarbonIntensityGenerationMixObject extends CarbonIntensityDataObject
{
  protected float $gas;
  protected float $coal;
  protected float $biomass;
  protected float $nuclear;
  protected float $hydro;
  protected float $imports;
  protected float $other;
  protected float $wind;
  protected float $solar;
  protected array  $generationmix;

  /*
        {
          "data":[
          {
            "from": "2018-01-20T12:00Z",
            "to": "2018-01-20T12:30Z",
            "generationmix": [
              {
                "fuel": "gas",
                "perc": 43.6
              },
              {
                "fuel": "coal",
                "perc": 0.7
              },
              {
                "fuel": "biomass",
                "perc": 4.2
              },
              {
                "fuel": "nuclear",
                "perc": 17.6
              },
              {
                "fuel": "hydro",
                "perc": 1.1
              },
              {
                "fuel": "imports",
                "perc": 6.5
              },
              {
                "fuel": "other",
                "perc": 0.3
              },
              {
                "fuel": "wind",
                "perc": 6.8
              },
              {
                "fuel": "solar",
                "perc": 18.1
              }
            ]
          }]
        }
     */

  public function __construct(array $dataArray)
  {
    $this->dataArray = $dataArray;
    unset($this->intensity);
    unset($this->forecast);
    unset($this->actual);
    unset($this->index);
    $this->from = $this->dataArray["from"];
    $this->to = $this->dataArray["to"];
    $this->generationmix = $this->dataArray["generationmix"];
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
