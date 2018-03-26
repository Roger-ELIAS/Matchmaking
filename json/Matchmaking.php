<?php

require('Test/TestMatchmaking.php');
require ('jsonParse.php');
$joueurs = getJsonData();
$groupe = array();


function placerJoueur($role,&$idTableau,$liste,&$niveauMoyen) {

    $i=0;
    while($i < sizeof($idTableau)+4) {
        $random= rand ( 0 , sizeof($idTableau));
        $tempID = $idTableau[$random];
        foreach ($liste as $ligne) {

            if ($ligne["id"] == $tempID && $ligne["role"]==$role) {
                if($niveauMoyen !=0 && $ligne["HR"]<$niveauMoyen+10 && $ligne["HR"]>$niveauMoyen-10){
                    unset($idTableau[$random]);
                    $idTableau = array_values($idTableau);
                    return $ligne;
                }else if($niveauMoyen==0){
                    unset($idTableau[$random]);
                    $idTableau = array_values($idTableau);
                    return $ligne;
                }
            }
        }
        ++$i;
    }
    $i=0;
    while($i < sizeof($idTableau)+4) {
        $random= rand ( 0 , sizeof($idTableau));
        $tempID = $idTableau[$random];
        foreach ($liste as $ligne) {
            if ($ligne["id"] == $tempID && $ligne["role"]==$role) {
                    unset($idTableau[$random]);
                    $idTableau = array_values($idTableau);
                    return $ligne;
            }
        }
        ++$i;
    }

};

function creerUneEquipe($joueurs,$idgame,&$idTableau){
    $equipe = new stdClass();
    $equipe->gameId=$idgame;
    $equipe->niveauMoyen=0;
    $teamComp=array("DPS","DPS","Healer","Tank");
    $equipe->listeJoueurs=array();
    for($i=0;$i<sizeof($teamComp);++$i) {
        $equipe->listeJoueurs[] = placerJoueur($teamComp[$i], $idTableau, $joueurs, $equipe->niveauMoyen);
        $equipe->niveauMoyen=0;
        foreach($equipe->listeJoueurs as $j){
            $equipe->niveauMoyen+=$j["HR"];
        }
        $equipe->niveauMoyen=$equipe->niveauMoyen/sizeof($equipe->listeJoueurs);
    }
    return $equipe;
};
function Matchmaking($joueurs,$groupe){
    $idTableau=array();
    foreach ($joueurs  as $ligne){
        $idTableau[]= $ligne["id"];
    }
    $nombreEquipe=cmptPlayer($joueurs)/4;
    for($i=0;$i<$nombreEquipe;++$i){
        $groupe[] = creerUneEquipe($joueurs,$i,$idTableau);
    }
    file_put_contents("groupes.json", "");
    $myfile = fopen("groupes.json", "w") or die("Unable to open file!");
    fwrite($myfile, json_encode($groupe));
    fclose($myfile);
}