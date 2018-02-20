# stageGeojson

 Hello,
 
 L'objectif de cet exercice était de construire un mappage du territoire belge, le découpant en provinces (équivalents 
 aux départements français) tout en sachant que la région de Bruxelles-Capitale n'en comporte aucune.
 La difficulté était donc de l'intégrer à ce mappage au format geojson.
 
 Je pense que considérer Bruxelles-Capitale comme une région qui contient une seule province (elle-même : Bruxelles-Capitale)
 est plus judicieux. Il est plus simple de l'ajouter à l'existant que de complètement modifier la structure des découpages 
 administratifs.
 
 J'ai donc récuperé les données geojson de la région de Bruxelles-Capitale depuis le fichier : admin_level_4.geojson
 et les provinces depuis le fichier : admin_level_6.geojson.
 
 Une fois ces données récupérées, je devais les fusionner de façon à avoir un fichier geojson cohérent et syntaxiquement correct.
 Pour se faire, j'ai d'abord isolé les coordonnées des provinces et celles de la région de Bruxelles afin de les assembler. 
 Pour ensuite fusionner les coordonées des provinces (comprenant Bruxelles) au reste du contenu du fichier admin_level_6.geojson.
 
 J'ai choisi d'utiliser PHP pour ce script. Ne connaissant pas geojson, j'ai préféré utiliser un langage avec lequel 
 je serais plus à l'aise. Et comme j'avais déjà manipulé des données json en PHP, je savais que c'était possible.
 Comme dit plus tôt, je n'avais aucune connaissance concernant geojson, il était donc nécessaire de me documenter 
 et grâce au site Mapzen et au lien wiki sur lequel ils redirigent, j'ai pu comprendre comment étaient décomposés 
 les différents fichiers.
 
 Il y a différents points sur lesquels je n'étais pas sûr de mesurer l'impact final. Par exemple,
 je n'ai pas osé modifier les informations relatives à la région de Bruxelles "devenue province".
 j'ai gardé le même identifiant, les mêmes noms, etc...
 Sans connaître comment ce geojson s'intégrait au reste du "projet", j'ai préféré laisser ces données en l'état. 
 
 J'espère que la solution proposée répond à l'exercice et te semblera pertinente.
 
 Driss
