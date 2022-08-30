<?php

declare(strict_types=1);

namespace Andre\CarbonIntensity;

class CarbonIntensityDataObject
{
    protected string $from;
    protected string $to;
    protected array  $intensity;
    protected int $forecast;
    protected ?int $actual; //nullable type hinting
    protected string $index;
    protected array  $dataArray;

    public function __construct(array $dataArray)
    {
        $this->dataArray = $dataArray;
        $this->from = $this->dataArray["from"];
        $this->to = $this->dataArray["to"];
        $this->intensity = $this->dataArray["intensity"];
        $this->forecast = $this->intensity["forecast"];
        $this->actual = $this->intensity["actual"];
        $this->index = $this->intensity["index"];
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
