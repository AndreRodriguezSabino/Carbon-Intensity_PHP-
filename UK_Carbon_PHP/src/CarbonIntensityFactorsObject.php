<?php

declare(strict_types=1);

namespace Andre\CarbonIntensity;

class CarbonIntensityFactorsObject extends CarbonIntensityDataObject
{
  protected int $Biomass;
  protected int $Coal;
  protected int $DutchImports;
  protected int $FrenchImports;
  protected int $GasCombinedCycle;
  protected int $GasOpenCycle;
  protected int $Hydro;
  protected int $IrishImports;
  protected int $Nuclear;
  protected int $Oil;
  protected int $Other;
  protected int $PumpedStorage;
  protected int $Solar;
  protected int $Wind;

  /*
      {
        "data":[
        {
          "Biomass": 120,
          "Coal": 937,
          "Dutch Imports": 474,
          "French Imports": 53,
          "Gas (Combined Cycle)": 394,
          "Gas (Open Cycle)": 651,
          "Hydro": 0,
          "Irish Imports": 458,
          "Nuclear": 0,
          "Oil": 935,
          "Other": 300,
          "Pumped Storage": 0,
          "Solar": 0,
          "Wind": 0
        }]
      }
     */

  public function __construct(array $dataArray)
  {
    $this->dataArray = $dataArray;
    //var_dump($this->data);
    //var_dump($JSONArray);
    unset($this->intensity);
    unset($this->forecast);
    unset($this->actual);
    unset($this->index);
    $this->Biomass = $this->dataArray["Biomass"];
    $this->Coal = $this->dataArray["Coal"];
    $this->DutchImports = $this->dataArray["Dutch Imports"];
    $this->FrenchImports = $this->dataArray["French Imports"];
    $this->GasCombinedCycle = $this->dataArray["Gas (Combined Cycle)"];
    $this->GasOpenCycle = $this->dataArray["Gas (Open Cycle)"];
    $this->Hydro = $this->dataArray["Hydro"];
    $this->IrishImports = $this->dataArray["Irish Imports"];
    $this->Nuclear = $this->dataArray["Nuclear"];
    $this->Oil = $this->dataArray["Oil"];
    $this->Other = $this->dataArray["Other"];
    $this->PumpedStorage = $this->dataArray["Pumped Storage"];
    $this->Solar = $this->dataArray["Solar"];
    $this->Wind = $this->dataArray["Wind"];
  }
}
