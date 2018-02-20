<?php

//Argument 1 : regions - Argument 2 : districts - Argument 3 : destination file
mergeBruxellesIntoDistricts();

function mergeBruxellesIntoDistricts(){
  $arrayData = getJsonFilesInArray();
  $districtsWithoutFeatures = getDataWithoutFeatures($arrayData["districts"]);
  $regionsFeatures = getDataFeatures($arrayData["regions"]);
  $districtsFeatures = getDataFeatures($arrayData["districts"]);
  $bruxelles = getBruxelles($regionsFeatures);
  $districtsFeatures = getFinalDistrictsFeatures($districtsFeatures,$bruxelles);
  $completeContent = mergeContent($districtsWithoutFeatures ,$districtsFeatures );
  createFinalJsonFile($completeContent);
}

function getJsonFilesInArray(){
  $arrayData = array();
  $regionsFile = file_get_contents($_SERVER['argv'][1]);
  $districtsFile = file_get_contents($_SERVER['argv'][2]) ;
  $arrayData["regions"] = json_decode($regionsFile,true);
  $arrayData["districts"] = json_decode($districtsFile,true);
  return $arrayData ;
}

function getDataWithoutFeatures($arrayData){
  $arrayData["features"] = [];
  return $arrayData;
}

function getDataFeatures($arrayData){
  $features = $arrayData["features"];
  return $features;
}

function getBruxelles($arrayData){
  $bruxelles = $arrayData[0];
  return $bruxelles;
}

function getFinalDistrictsFeatures($districts , $bruxelles){
  array_push($districts,$bruxelles);
  return $districts ;
}

function mergeContent($withoutFeatures ,$districtsFeatures ){
  $withoutFeatures["features"] = $districtsFeatures ;
  $completeContent = $withoutFeatures ;
  return $completeContent ;
}

function createFinalJsonFile($completeContent){
  $completeContent = json_encode($completeContent);
  file_put_contents($_SERVER['argv'][3], $completeContent);
  var_dump($completeContent); //(Optional)
}
?>
