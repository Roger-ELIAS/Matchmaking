<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../css/main.css">
<?php
/**
 * Created by PhpStorm.
 * User: e16009284
 * Date: 26/03/18
 * Time: 14:50
 */
include "Matchmaking.php";

Matchmaking($joueurs, $groupe);


$tableau = getJsonGroupe();
foreach ($tableau as $equipe)
{
    $compt=0;
    $liste= $equipe["listeJoueurs"];
    foreach ($liste as $ligne){
        $compt +=$ligne["HR"];
    }
    $res=$compt/4;
?>
<table border="1px" class="table table-striped table-dark">
    <tr>
        <th style="text-align: right">Equipe</th>
        <th><?= "n°" .$equipe["gameId"]?></th>
        <th style="text-align: right">Niveau moyen</th>
        <th><?= $equipe["niveauMoyen"] ?></th>
    </tr>
    <tr>
        <th>Pseudo</th>
        <th>ID</th>
        <th>Role</th>
        <th>HR</th>
    </tr>
    <?php

    foreach($liste as $ligne) {
        if ($ligne["role"] == "Tank"){
            $color = "LightBlue";
        }elseif ($ligne["role"] == "Healer"){
            $color = "LightGreen";
        }else{
            $color = "LightCoral";
        }

        if ($ligne["HR"] < 50){
            $colorrank = "white";
        }elseif ($ligne["HR"] < 75){
            $colorrank = "Silver";
        }else{
            $colorrank = "Gold";
        }

        ?>
        <tr>
            <td style="background-color: white; color: black"> <?php echo $ligne["playerID"] ; ?> </td>
            <td style="background-color: white; color: black"> <?php echo $ligne["id"] ; ?> </td>
            <td style="background-color:<?= $color?>;color:black;"> <?php echo $ligne["role"] ; ?> </td>
            <td style="background-color:<?= $colorrank?>;color:black;"> <?php echo $ligne["HR"] ; ?> </td>
        </tr>
    <?php }?>
</table>
<?php }?>
