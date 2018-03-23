<?php
/**
 * Created by PhpStorm.
 * User: j16002788
 * Date: 23/03/18
 * Time: 10:57
 */

function TestParse($link) {
    $json_source = file_get_contents($link);
    $cmpt = 0;
    $json_data = json_decode($json_source, true);
    foreach ($json_data as $v) {
        if(isset($v['playerID']) && isset($v['id'])) {
            $cmpt += 1;
        }
    }
    if($cmpt < 100){
        return false;
    }
    else if($cmpt >100){
        return false;
    }
    else if($cmpt == 100){
        return true;
    }
};