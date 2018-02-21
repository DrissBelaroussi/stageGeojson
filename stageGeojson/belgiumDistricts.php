<?php
//Argument 1 : regions - Argument 2 : districts - Argument 3 : destination file
mergeBruxellesIntoDistricts();

function mergeBruxellesIntoDistricts(){
  $FilesContentInArray = getJsonFilesInArray(getArgument("regions") , getArgument("districts"));
  $districtsWithoutFeatures = splitDataFromFeatures($FilesContentInArray["districts"]);
  $regionsFeatures = getDataFeatures($FilesContentInArray["regions"]);
  $districtsFeatures = getDataFeatures($FilesContentInArray["districts"]);
  $bruxelles = getBruxelles($regionsFeatures);
  $districtsFeatures = getFinalDistrictsFeatures($districtsFeatures,$bruxelles);
  $completeContent = mergeContent($districtsWithoutFeatures ,$districtsFeatures );
  createFinalJsonFile($completeContent,getArgument("destinationFile") );
}
function getArgument($arg){
  $argument ;
  switch($arg){
    case "regions" :
      $argument = $_SERVER['argv'][1];
      break;
    case "districts" :
      $argument = $_SERVER['argv'][2];
      break;
    case "destinationFile" :
      $argument = $_SERVER['argv'][3];
      break;
    default:
      break;
  }
  return $argument;
}

function getJsonFilesInArray($regionsFile,$districtsFile){
  $FilesContentInArray = array();
  $FilesContentInArray["regions"] = json_decode(file_get_contents($regionsFile),true);
  $FilesContentInArray["districts"] = json_decode(file_get_contents($districtsFile),true);
  return $FilesContentInArray ;
}

function splitDataFromFeatures($FilesContentInArray){
  $FilesContentInArray["features"] = [];
  return $FilesContentInArray;
}

function getDataFeatures($FilesContentInArray){
  return $FilesContentInArray["features"];
}

function getBruxelles($FilesContentInArray){
  return $FilesContentInArray[0];
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

function createFinalJsonFile($completeContent,$destFile){
  $completeContent = json_encode($completeContent);
  file_put_contents($destFile, $completeContent);
  var_dump($completeContent); //(Optional)
}
?>
