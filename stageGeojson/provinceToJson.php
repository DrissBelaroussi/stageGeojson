<?php

//Récupération du contenu des fichiers : provinces et régions
$regionsFile = file_get_contents("admin_level_4.geojson");
$provincesFile = file_get_contents("admin_level_6.geojson");

//Transforme le code json en tableaux associatifs
$regions = json_decode($regionsFile,true);
$provinces = json_decode($provincesFile,true);

//Récupère les données sans "features" qui contient les coordonnées
//des provinces
$haut = $provinces ;
$haut["features"] = [];

//Récupère les coordonnées des provinces
$provinces = $provinces["features"];

//Récupère les coordonnées de Bruxelles
$regions =  $regions["features"];
$bruxelles = $regions[0];

//Fusionne les coordonnées de la région de Bruxelles avec les coordonnées
//des provinces
array_push($provinces,$bruxelles);

//Regroupe les deux extrémités du contenu
$haut["features"] = $provinces ;

//Remet les données au format json et écrit dans le fichier geojson
$corps = json_encode($haut);
file_put_contents('belgium_regions.geojson', $corps);
var_dump($corps);
 ?>
