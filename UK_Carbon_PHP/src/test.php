<?php

declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';

use Andre\CarbonIntensity;

$CI = new CarbonIntensity\CarbonIntensity();

/*
$intensityDateNoArgs = $CI->getIntensityDate();
foreach ($intensityDateNoArgs as $val) {
  var_dump($val->get('from'));
  var_dump($val->get('intensity'));
  var_dump($val->get('actual'));
  var_dump($val->get('index'));
}
*/

/*
$intensityDateOnlyDateArg = $CI->getIntensityDate('2022-08-26');
foreach ($intensityDateOnlyDateArg as $val) {
  var_dump($val->get('from'));
  var_dump($val->get('intensity'));
  var_dump($val->get('actual'));
  var_dump($val->get('index'));
}
 */

/*
  $intensityDatePeriod1 = $CI->getIntensityDate('2022-08-26', '1');
  foreach ($intensityDatePeriod1 as $val) {
  var_dump($val->get('from'));
  var_dump($val->get('intensity'));
  var_dump($val->get('actual'));
  var_dump($val->get('index'));
  }
 */

/*
  $intensityDatePeriod4 = $CI->getIntensityDate('2022-08-26', '4');
  foreach ($intensityDatePeriod4 as $val) {
  var_dump($val->get('from'));
  var_dump($val->get('intensity'));
  var_dump($val->get('actual'));
  var_dump($val->get('index'));
  }
 */

/*
  $intensityFactors1 = $CI->getIntensityFactors();
  foreach ($intensityFactors1 as $val) {
  var_dump($val->get('Biomass'));
  var_dump($val->get('Coal'));
  var_dump($val->get('Solar'));
  var_dump($val->get('dataArray'));
  var_dump($val->getAll());
  }
 */

/*
  $intensityTest1 = $CI->getIntensity();
  var_dump($intensityTest1);
  var_dump($intensityTest1->get('from'));
  var_dump($intensityTest1->get('intensity'));
  var_dump($intensityTest1->get('actual'));
  var_dump($intensityTest1->get('index'));
 */

/*
  $intensityTest2 = $CI->getIntensityFromTo('2022-08-26T16:31Z');
  foreach ($intensityTest2 as $val) {
  var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('actual'));
  var_dump($val->get('index'));
  var_dump($val->get('intensity'));
  }
 */

/*
  $intensityTest3 = $CI->getIntensityFromTo('2022-08-26T08:01Z', '2021-07-07T09:00Z');
  foreach ($intensityTest3 as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('actual'));
  var_dump($val->get('index'));
  var_dump($val->get('intensity'));
  }
 */

/*
  $intensityFW24h = $CI->getIntensityFW24h('2022-08-26T08:01Z');
  foreach ($intensityFW24h as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('actual'));
  var_dump($val->get('index'));
  var_dump($val->get('intensity'));
  }
 */

/*
  $intensityFW48h = $CI->getIntensityFW48h('2022-08-26T08:01Z');
  foreach ($intensityFW48h as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('actual'));
  var_dump($val->get('index'));
  var_dump($val->get('intensity'));
  }
 */

/*
  $intensityPT24h = $CI->getIntensityPT24h('2022-08-26T08:01Z');
  foreach ($intensityPT24h as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('actual'));
  var_dump($val->get('index'));
  var_dump($val->get('intensity'));
  }
 */

/*
  $intensityStats1 = $CI->getIntensityStats('2022-08-26T08:01Z', '2022-08-26T12:00Z');
  foreach ($intensityStats1 as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('min'));
  var_dump($val->get('max'));
  var_dump($val->get('average'));
  var_dump($val->get('intensity'));
  }
  $intensityStats2 = $CI->getIntensityStats('2022-08-26T08:01Z', '2022-08-26T12:00Z', '2');
  foreach ($intensityStats2 as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('min'));
  var_dump($val->get('max'));
  var_dump($val->get('average'));
  var_dump($val->get('intensity'));
  }
 */


/*
  $generationPT24h = $CI->getGenerationPT24h('2022-08-26T08:01Z');
  foreach ($generationPT24h as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  var_dump($val->get('generationmix'));
  }
 */

/*
  $generation1 = $CI->getGeneration();
  //var_dump($generation1);
  var_dump($generation1->get('from'));
  var_dump($generation1->get('gas'));
  var_dump($generation1->get('solar'));
  var_dump($generation1->get('hydro'));
  var_dump($generation1->get('other'));
  var_dump($generation1->get('wind'));
  var_dump($generation1->get('generationmix'));
 */

/*
  $generationFromTo1 = $CI->getGenerationFromTo('2022-08-26T08:01Z', '2022-08-26T12:00Z');
  foreach ($generationFromTo1 as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  var_dump($val->get('generationmix'));
  }
 */

/*
  $regional1 = $CI->getRegional();
  //var_dump($regional1);
  var_dump($regional1->get('from'));
  foreach ($regional1->get('regions') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalEngland1 = $CI->getRegionalEngland();
  //var_dump($regionalEngland1);
  var_dump($regionalEngland1->get('from'));
  var_dump($regionalEngland1->get('dnoregion'));
  var_dump($regionalEngland1->get('shortname'));
  foreach ($regionalEngland1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalScotland1 = $CI->getRegionalScotland();
  //var_dump($regionalEngland1);
  var_dump($regionalScotland1->get('from'));
  var_dump($regionalScotland1->get('dnoregion'));
  var_dump($regionalScotland1->get('shortname'));
  foreach ($regionalScotland1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalWales1 = $CI->getRegionalWales();
  //var_dump($regionalEngland1);
  var_dump($regionalWales1->get('from'));
  var_dump($regionalWales1->get('dnoregion'));
  var_dump($regionalWales1->get('shortname'));
  foreach ($regionalWales1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalPostcode1 = $CI->getRegionalPostcode('RG10');
  //var_dump($regionalPostcode1);
  var_dump($regionalPostcode1->get('from'));
  var_dump($regionalPostcode1->get('dnoregion'));
  var_dump($regionalPostcode1->get('shortname'));
  var_dump($regionalPostcode1->get('postcode'));
  foreach ($regionalPostcode1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('postcode'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalPostcode1 = $CI->getRegionalPostcode('RG10');
  //var_dump($regionalPostcode1);
  var_dump($regionalPostcode1->get('from'));
  var_dump($regionalPostcode1->get('dnoregion'));
  var_dump($regionalPostcode1->get('shortname'));
  var_dump($regionalPostcode1->get('postcode'));
  foreach ($regionalPostcode1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('postcode'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalRegionID1 = $CI->getRegionalRegionID(13);
  //13 = London
  //var_dump($regionalRegionID1);
  var_dump($regionalRegionID1->get('from'));
  var_dump($regionalRegionID1->get('dnoregion'));
  var_dump($regionalRegionID1->get('shortname'));
  foreach ($regionalRegionID1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalIntensityFromFw24h1 = $CI->getRegionalIntensityFromFw24h('2022-08-26T11:30Z');
  //var_dump($regionalIntensityFromFw24h1);
  var_dump($regionalIntensityFromFw24h1->get('from'));
  foreach ($regionalIntensityFromFw24h1->get('regions') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalIntensityFromFw24hPostcode1 = $CI->getRegionalIntensityFromFw24hPostcode('2022-08-26T11:30Z', 'RG10');
  //var_dump($regionalIntensityFromFw24hPostcode1);
  var_dump($regionalIntensityFromFw24hPostcode1->get('regionid'));
  var_dump($regionalIntensityFromFw24hPostcode1->get('postcode'));
  var_dump($regionalIntensityFromFw24hPostcode1->get('dnoregion'));
  var_dump($regionalIntensityFromFw24hPostcode1->get('shortname'));
  foreach ($regionalIntensityFromFw24hPostcode1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalIntensityFromFw24hRegionID1 = $CI->getRegionalIntensityFromFw24hRegionID('2022-08-26T11:30Z', 13);
  //var_dump($regionalIntensityFromFw24hRegionID1);
  var_dump($regionalIntensityFromFw24hRegionID1->get('regionid'));
  var_dump($regionalIntensityFromFw24hRegionID1->get('dnoregion'));
  var_dump($regionalIntensityFromFw24hRegionID1->get('shortname'));
  foreach ($regionalIntensityFromFw24hRegionID1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalIntensityFromFw48h1 = $CI->getRegionalIntensityFromFw48h('2022-08-26T11:30Z');
  //var_dump($regionalIntensityFromFw48h1);
  var_dump($regionalIntensityFromFw48h1->get('from'));
  foreach ($regionalIntensityFromFw48h1->get('regions') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalIntensityFromFw48hPostcode1 = $CI->getRegionalIntensityFromFw48hPostcode('2022-08-26T11:30Z', 'RG10');
  //var_dump($regionalIntensityFromFw48hPostcode1);
  var_dump($regionalIntensityFromFw48hPostcode1->get('regionid'));
  var_dump($regionalIntensityFromFw48hPostcode1->get('postcode'));
  var_dump($regionalIntensityFromFw48hPostcode1->get('dnoregion'));
  var_dump($regionalIntensityFromFw48hPostcode1->get('shortname'));
  foreach ($regionalIntensityFromFw48hPostcode1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalIntensityFromFw48hRegionID1 = $CI->getRegionalIntensityFromFw48hRegionID('2022-08-26T11:30Z', 13);
  //var_dump($regionalIntensityFromFw48hRegionID1);
  var_dump($regionalIntensityFromFw48hRegionID1->get('regionid'));
  var_dump($regionalIntensityFromFw48hRegionID1->get('dnoregion'));
  var_dump($regionalIntensityFromFw48hRegionID1->get('shortname'));
  foreach ($regionalIntensityFromFw48hRegionID1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */




/*
  $regionalIntensityFromPt24h1 = $CI->getRegionalIntensityFromPt24h('2022-08-26T11:30Z');
  //var_dump($regionalIntensityFromPt24h1);
  var_dump($regionalIntensityFromPt24h1->get('from'));
  foreach ($regionalIntensityFromPt24h1->get('regions') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalIntensityFromPt24hPostcode1 = $CI->getRegionalIntensityFromPt24hPostcode('2022-08-26T11:30Z', 'RG10');
  //var_dump($regionalIntensityFromPt24hPostcode1);
  var_dump($regionalIntensityFromPt24hPostcode1->get('regionid'));
  var_dump($regionalIntensityFromPt24hPostcode1->get('postcode'));
  var_dump($regionalIntensityFromPt24hPostcode1->get('dnoregion'));
  var_dump($regionalIntensityFromPt24hPostcode1->get('shortname'));
  foreach ($regionalIntensityFromPt24hPostcode1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
  $regionalIntensityFromPt24hRegionID1 = $CI->getRegionalIntensityFromPt24hRegionID('2022-08-26T11:30Z', 13);
  //var_dump($regionalIntensityFromPt24hRegionID1);
  var_dump($regionalIntensityFromPt24hRegionID1->get('regionid'));
  var_dump($regionalIntensityFromPt24hRegionID1->get('dnoregion'));
  var_dump($regionalIntensityFromPt24hRegionID1->get('shortname'));
  foreach ($regionalIntensityFromPt24hRegionID1->get('data') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */


/*
  $regionalIntensityFromTo1 = $CI->getRegionalIntensityFromTo('2022-08-26T11:30Z', '2022-08-26T12:30Z');
  //var_dump($regionalIntensityFromTo1);
  var_dump($regionalIntensityFromTo1->get('from'));
  foreach ($regionalIntensityFromTo1->get('regions') as $val) {
  //var_dump($val);
  var_dump($val->get('from'));
  var_dump($val->get('shortname'));
  var_dump($val->get('regionid'));
  var_dump($val->get('gas'));
  var_dump($val->get('solar'));
  //var_dump($val->get('generationmix'));
  }
 */

/*
$regionalIntensityFromToPostcode1 = $CI->getRegionalIntensityFromToPostcode('2022-08-26T11:30Z', '2022-08-26T12:30Z', 'RG10');
//var_dump($regionalIntensityFromToPostcode1);
var_dump($regionalIntensityFromToPostcode1->get('regionid'));
var_dump($regionalIntensityFromToPostcode1->get('postcode'));
var_dump($regionalIntensityFromToPostcode1->get('shortname'));
foreach ($regionalIntensityFromToPostcode1->get('data') as $val) {
    //var_dump($val);
    var_dump($val->get('from'));
    var_dump($val->get('shortname'));
    var_dump($val->get('regionid'));
    var_dump($val->get('gas'));
    var_dump($val->get('solar'));
    //var_dump($val->get('generationmix'));
}
*/

/*
$regionalIntensityFromToRegionID1 = $CI->getRegionalIntensityFromToRegionID('2022-08-26T11:30Z', '2022-08-26T12:30Z', 13);
//var_dump($regionalIntensityFromToRegionID1);
var_dump($regionalIntensityFromToRegionID1->get('regionid'));
var_dump($regionalIntensityFromToRegionID1->get('dnoregion'));
var_dump($regionalIntensityFromToRegionID1->get('shortname'));
foreach ($regionalIntensityFromToRegionID1->get('data') as $val) {
    //var_dump($val);
    var_dump($val->get('from'));
    var_dump($val->get('shortname'));
    var_dump($val->get('regionid'));
    var_dump($val->get('gas'));
    var_dump($val->get('solar'));
    //var_dump($val->get('generationmix'));
}
*/