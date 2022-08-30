<?php

declare(strict_types=1);

namespace Andre\CarbonIntensity;

class CarbonIntensityStatsObject extends CarbonIntensityDataObject
{
  protected int $min;
  protected int $max;
  protected int $average;
  //protected string $from;
  //protected string $to;
  //protected array  $intensity;
  //protected string $index;
  //protected array  $dataArray;

  /*
    {
  "data":[
    {
    "from": "2018-01-20T12:00Z",
    "to": "2018-01-20T12:30Z",
    "intensity": {
      "forecast": 266,
      "actual": 263,
      "index": "moderate"
    }
  }]
}
{
  "error":{
    "code": "400 Bad Request",
    "message": "string"
  }
}
{
  "error":{
    "code": "500 Internal Server Error",
    "message": "string"
  }
}
  */

  public function __construct(array $dataArray)
  {
    //var_dump($carbonIntensityResponse);
    //parent::__construct($dataArray);
    $this->dataArray = $dataArray;
    //var_dump($this->dataArray);
    unset($this->forecast);
    unset($this->actual);
    $this->from = $this->dataArray["from"];
    $this->to = $this->dataArray["to"];
    $this->intensity = $this->dataArray["intensity"];
    $this->max = $this->intensity["max"];
    $this->min = $this->intensity["min"];
    $this->average = $this->intensity["average"];
  }
}
