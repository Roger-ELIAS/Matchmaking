<?php
/**
 * Created by PhpStorm.
 * User: j16002788
 * Date: 23/03/18
 * Time: 10:57
 */






class TestParse {
    public function testGetJsonData(){
        $var = getJsonData();
        $this->assertSame(true,isset($var) ) ;

    }
    public function testCmptPlayer(){
        $cmpt=cmptPlayer(getJsonData());
        $this->assertSame(true, $cmpt) ;
    }

}