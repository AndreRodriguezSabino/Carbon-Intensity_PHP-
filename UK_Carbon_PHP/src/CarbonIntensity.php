<?php

declare(strict_types=1);

namespace Andre\CarbonIntensity;

use GuzzleHttp\Psr7\Client;
use Andre\CarbonIntensity\CarbonIntensityResponse;
use Andre\CarbonIntensity\CarbonIntensityRegionalResponse;
use Exception;

class CarbonIntensity
{

    protected $client = null;

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.carbonintensity.org.uk/',
            // You can set any number of default request options.
            'timeout' => 60.0,
        ]);
    }

    public function getIntensityFactors()
    {
        //https://carbon-intensity.github.io/api-definitions/?shell#get-intensity-factors
        $endpointString = 'intensity/factors';
        $obj = $this->callApiEndpoint($endpointString, 'CarbonIntensityFactorsObject');
        return $obj->get('data');
    }

    public function getIntensityDate(string $date = '', string $period = ''): array
    {
        //https://carbon-intensity.github.io/api-definitions/?shell#get-intensity-date
        //https://carbon-intensity.github.io/api-definitions/?shell#get-intensity-date-date
        //https://carbon-intensity.github.io/api-definitions/?shell#get-intensity-date-date-period
        $endpointString = sprintf('intensity/date/%s/%s', $date, $period);
        $obj = $this->callApiEndpoint($endpointString);
        return $obj->get('data');
    }

    private function callApiEndpoint(
        string $endpoint,
        string $objectType = 'CarbonIntensityDataObject'
    ): CarbonIntensityResponse {
        try {
            $response = $this->client->get(
                $endpoint,
                [
                    'headers' => [
                        'Accept' => 'application/json',
                    ]
                ]
            );
        } catch (Exception $e) {
            exit(sprintf("exception %s: %s\n", $e->getCode(), $e->getMessage()));
        }

        $responseObject = new CarbonIntensityResponse($response, $objectType);
        return $responseObject;
    }

    public function getIntensity(): CarbonIntensityDataObject
    {
        //https://carbon-intensity.github.io/api-definitions/?shell#get-intensity
        $endpointString = 'intensity';
        $obj = $this->callApiEndpoint($endpointString);
        return $obj->get('data')[0];
    }

    public function getIntensityFromTo(
        string $from = '',
        string $to = ''
    ): array {
        //https://carbon-intensity.github.io/api-definitions/?shell#get-intensity-from
        //https://carbon-intensity.github.io/api-definitions/?shell#get-intensity-from-to
        $endpointString = sprintf('intensity/%s/%s', $from, $to);
        $obj = $this->callApiEndpoint($endpointString);
        return $obj->get('data');
    }

    public function getIntensityFW24h(
        string $from
    ): array {
        //https://carbon-intensity.github.io/api-definitions/?shell#get-intensity-from-fw24h
        $endpointString = sprintf('intensity/%s/fw24h', $from);
        $obj = $this->callApiEndpoint($endpointString);
        return $obj->get('data');
    }

    public function getIntensityFW48h(
        string $from
    ): array {
        //https://carbon-intensity.github.io/api-definitions/?shell#get-intensity-from-fw48h
        $endpointString = sprintf('intensity/%s/fw48h', $from);
        $obj = $this->callApiEndpoint($endpointString);
        return $obj->get('data');
    }

    public function getIntensityPT24h(
        string $from
    ): array {
        //https://carbon-intensity.github.io/api-definitions/?shell#get-intensity-from-pt24h
        $endpointString = sprintf('intensity/%s/pt24h', $from);
        $obj = $this->callApiEndpoint($endpointString);
        return $obj->get('data');
    }

    public function getIntensityStats(
        string $from,
        string $to,
        string $block = ''
    ): array {
        //https://carbon-intensity.github.io/api-definitions/#get-intensity-stats-from-to
        //https://carbon-intensity.github.io/api-definitions/#get-intensity-stats-from-to-block
        $endpointString = sprintf('intensity/stats/%s/%s/%s', $from, $to, $block);
        $obj = $this->callApiEndpoint($endpointString, 'CarbonIntensityStatsObject');
        return $obj->get('data');
    }

    public function getGeneration(): CarbonIntensityGenerationMixObject
    {
        //https://carbon-intensity.github.io/api-definitions/#get-generation
        //https://carbon-intensity.github.io/api-definitions/#get-generation-from-to
        $endpointString = 'generation';
        $obj = $this->callApiEndpoint($endpointString, 'CarbonIntensityGenerationMixObject', false);
        return $obj->get('data')[0];
    }

    public function getGenerationFromTo(
        string $from,
        string $to
    ): array {
        //https://carbon-intensity.github.io/api-definitions/#get-generation
        //https://carbon-intensity.github.io/api-definitions/#get-generation-from-to
        $endpointString = sprintf('generation/%s/%s', $from, $to);
        $obj = $this->callApiEndpoint($endpointString, 'CarbonIntensityGenerationMixObject');
        return $obj->get('data');
    }

    public function getGenerationPT24h(
        string $from
    ): array {
        //https://carbon-intensity.github.io/api-definitions/#get-generation-from-pt24h
        $endpointString = sprintf('generation/%s/pt24h', $from);
        $obj = $this->callApiEndpoint($endpointString, 'CarbonIntensityGenerationMixObject');
        return $obj->get('data');
    }

    private function callApiEndpointRegional(
        string $endpoint,
        bool $hasDataArray = false,
        bool $getDataFromFirstKey = true
    ): CarbonIntensityRegionalResponse {
        try {
            $response = $this->client->get(
                $endpoint,
                [
                    'headers' => [
                        'Accept' => 'application/json',
                    ]
                ]
            );
        } catch (Exception $e) {
            exit(sprintf("exception %s: %s\n", $e->getCode(), $e->getMessage()));
        }

        $responseObject = new CarbonIntensityRegionalResponse($response, $hasDataArray, $getDataFromFirstKey);
        return $responseObject;
    }

    public function getRegional(): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional
        $endpointString = 'regional';
        $obj = $this->callApiEndpointRegional($endpointString);
        return $obj;
    }

    public function getRegionalEngland(): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-england
        $endpointString = 'regional/england';
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true);
        return $obj;
    }

    public function getRegionalScotland(): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-scotland
        $endpointString = 'regional/scotland';
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true);
        return $obj;
    }

    public function getRegionalWales(): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-wales
        $endpointString = 'regional/wales';
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true);
        return $obj;
    }

    public function getRegionalPostcode(string $postcode): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-postcode-postcode
        $endpointString = sprintf('regional/postcode/%s', $postcode);
        //regex validation: '^([A-Z][A-HJ-Y]?[0-9][A-Z0-9]?|GIR)$'
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true);
        return $obj;
    }

    public function getRegionalRegionID(int $regionID): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-regionid-regionid
        $endpointString = sprintf('regional/regionid/%s', $regionID);
        //validation: [1-17] https://carbon-intensity.github.io/api-definitions/#region-list
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true);
        return $obj;
    }

    public function getRegionalIntensityFromFw24h(string $from): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-fw24h
        $endpointString = sprintf('regional/intensity/%s/fw24h', $from);
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = false);
        return $obj;
    }

    public function getRegionalIntensityFromFw24hPostcode(string $from, string $postcode): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-fw24h-postcode-postcode
        $endpointString = sprintf('regional/intensity/%s/fw24h/postcode/%s', $from, $postcode);
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true, $getDataFromFirstKey = false);
        return $obj;
    }

    public function getRegionalIntensityFromFw24hRegionID(string $from, int $regionID): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-fw24h-postcode-postcode
        $endpointString = sprintf('regional/intensity/%s/fw24h/regionid/%s', $from, $regionID);
        //validation: [1-17] https://carbon-intensity.github.io/api-definitions/#region-list
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true, $getDataFromFirstKey = false);
        return $obj;
    }

    public function getRegionalIntensityFromFw48h(string $from): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-fw48h
        $endpointString = sprintf('regional/intensity/%s/fw48h', $from);
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = false);
        return $obj;
    }

    public function getRegionalIntensityFromFw48hPostcode(string $from, string $postcode): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-fw48h-postcode-postcode
        $endpointString = sprintf('regional/intensity/%s/fw48h/postcode/%s', $from, $postcode);
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true, $getDataFromFirstKey = false);
        return $obj;
    }

    public function getRegionalIntensityFromFw48hRegionID(string $from, int $regionID): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-fw48h-regionid-regionid
        $endpointString = sprintf('regional/intensity/%s/fw48h/regionid/%s', $from, $regionID);
        //validation: [1-17] https://carbon-intensity.github.io/api-definitions/#region-list
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true, $getDataFromFirstKey = false);
        return $obj;
    }

    public function getRegionalIntensityFromPt24h(string $from): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-pt24h
        $endpointString = sprintf('regional/intensity/%s/pt24h', $from);
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = false);
        return $obj;
    }

    public function getRegionalIntensityFromPt24hPostcode(string $from, string $postcode): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-pt24h-postcode-postcode
        $endpointString = sprintf('regional/intensity/%s/pt24h/postcode/%s', $from, $postcode);
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true, $getDataFromFirstKey = false);
        return $obj;
    }

    public function getRegionalIntensityFromPt24hRegionID(string $from, int $regionID): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-pt24h-regionid-regionid
        $endpointString = sprintf('regional/intensity/%s/pt24h/regionid/%s', $from, $regionID);
        //validation: [1-17] https://carbon-intensity.github.io/api-definitions/#region-list
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true, $getDataFromFirstKey = false);
        return $obj;
    }

    public function getRegionalIntensityFromTo(string $from, string $to): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-pt24h
        $endpointString = sprintf('regional/intensity/%s/%s', $from, $to);
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = false);
        return $obj;
    }

    public function getRegionalIntensityFromToPostcode(string $from, string $to, string $postcode): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-pt24h-postcode-postcode
        $endpointString = sprintf('regional/intensity/%s/%s/postcode/%s', $from, $to, $postcode);
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true, $getDataFromFirstKey = false);
        return $obj;
    }

    public function getRegionalIntensityFromToRegionID(string $from, string $to, int $regionID): CarbonIntensityRegionalResponse
    {
        //https://carbon-intensity.github.io/api-definitions/#get-regional-intensity-from-pt24h-regionid-regionid
        $endpointString = sprintf('regional/intensity/%s/%s/regionid/%s', $from, $to, $regionID);
        //validation: [1-17] https://carbon-intensity.github.io/api-definitions/#region-list
        $obj = $this->callApiEndpointRegional($endpointString, $hasDataArray = true, $getDataFromFirstKey = false);
        return $obj;
    }
}
