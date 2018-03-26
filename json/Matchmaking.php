<?php

require('Test/TestMatchmaking.php');
require ('jsonParse.php');
$joueurs = getJsonData();
$groupe = array();


function placerJoueur($role,$idTableau,$liste) {
    $i=0;
    while($i < sizeof($idTableau)) {
        $random= rand ( 1 , sizeof($idTableau));
        foreach ($liste as $ligne) {
            if ($ligne["id"] == $random && $ligne["role"]==$role) {
                unset($idTableau[$random]);
                return $ligne;
            }
        }
        ++$i;
    }

};

function creerUneEquipe($joueurs,$idgame){
    $idTableau=array();
    $equipe = new stdClass();
    $equipe->gameId=$idgame;

    $teamComp=array();
    //DPS
    $teamComp[]="DPS";
    //Tank
    $teamComp[]="DPS";
    //Healer
    $teamComp[]="Healer";
    $teamComp[]="Tank";
    $equipe->listeJoueurs=array();
    foreach ($joueurs  as $ligne){
        $idTableau[]= $ligne["id"];
    }
    for($i=0;$i<sizeof($teamComp);++$i)
    $equipe->listeJoueurs[]=placerJoueur($teamComp[$i],$idTableau,$joueurs);


    return $equipe;
};

function Matchmaking($joueurs,$groupe){
    $nombreEquipe=cmptPlayer($joueurs)/4;
    for($i=0;$i<$nombreEquipe;++$i){
        $groupe[] = creerUneEquipe($joueurs,$i);
    }
    file_put_contents("groupes.json", "");
    $myfile = fopen("groupes.json", "w") or die("Unable to open file!");
    fwrite($myfile, json_encode($groupe));
    fclose($myfile);
}


