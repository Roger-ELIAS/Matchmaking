<?php
require('Test/TestParse.php');
/**
 * Created by PhpStorm.
 * User: j16002788
 * Date: 23/03/18
 * Time: 10:59
 */


function getJsonData(){
    $json_source = file_get_contents("players.json");
    $json_data = json_decode($json_source, true);
    return $json_data;
}


function cmptPlayer($json_data) {

    $cmpt = 0;

    foreach ($json_data as $v) {
        if(isset($v['playerID']) && isset($v['id'])) {
            $cmpt += 1;
        }
    }
    return $cmpt;
};

