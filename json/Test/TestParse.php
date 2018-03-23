<?php
/**
 * Created by PhpStorm.
 * User: j16002788
 * Date: 23/03/18
 * Time: 10:57
 */






class TestParse {
    public function testGetJsonData(){
        $json_source = file_get_contents("../players.json");
        $json_data = json_decode($json_source, true);
        $this->assertSame(true, isset($json_data)) ;

    }
    public function testCmptPlayer(){
        $json_source = file_get_contents("../players.json");
        $json_data = json_decode($json_source, true);
        $this->assertSame(true, cmptPlayer($json_data)) ;
    }

}