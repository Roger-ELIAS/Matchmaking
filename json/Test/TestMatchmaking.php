<?php
/**
 * Created by PhpStorm.
 * User: j16002788
 * Date: 23/03/18
 * Time: 10:57
 */






class TestMatchmaking{
    public function testPlacerJoueur(){

        $idTableau= array();
        $idTableau[]=1;
        $idTableau[]=2;
        $equipeTest[]=placerJoueur(2,$idTableau,getJsonData());
        $this->assertSame(true, sizeof($equipeTest)) ;

    }

    public function testCreerUneEquipe(){

        $equipeTest=creerUneEquipe(getJsonData(),1);


        $this->assertSame(true, isset($equipeTest)) ;
    }

    public function testMatchmaking(){
        $json_source = file_get_contents("groupes.json");
        $json_data = json_decode($json_source, true);
        $this->assertSame(true, isset($json_data)) ;
    }



}