<?php
/**
 * Created by PhpStorm.
 * User: e16009284
 * Date: 26/03/18
 * Time: 14:48
 */
if (isset($_POST['joueur'])){
    require "vueTableau.php";
}elseif (isset($_POST['equipe'])){
    require "vueTableau.php";
}else{
    echo"aucun";
}