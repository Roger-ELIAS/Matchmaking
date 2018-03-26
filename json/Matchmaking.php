<?php

require('Test/TestMatchmaking.php');
require ('jsonParse.php');
$joueurs = getJsonData();
$groupe = array();


function placerJoueur($id,$idTableau,$liste) {
    foreach($liste as $ligne){
        if($ligne["id"]==$id) {
            unset($idTableau[$id]);
            return $ligne;
        }
    }

};

function creerUneEquipe($joueurs,$idgame){
    $idTableau=array();
    $equipe = new stdClass();
    $equipe->gameId=$idgame;
    $equipe->listeJoueurs=array();
    foreach ($joueurs  as $ligne){
        $idTableau[]= $ligne["id"];
    }

    for($j=0;$j<4;++$j){
        $random= rand ( 1 , sizeof($idTableau));
        $equipe->listeJoueurs[]=placerJoueur($random,$idTableau,$joueurs);
    }

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


