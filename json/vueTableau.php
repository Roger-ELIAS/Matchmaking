<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../css/main.css">
<?php

require("jsonParse.php");
$tableau = getJsonData();
?>

<table border="1px" class="table">
    <tr class="thead-dark">
        <th>Pseudo</th>
        <th>ID</th>
        <th>Role</th>
        <th>HR</th>
    </tr>
    <?php
    foreach($tableau as $ligne) {
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
            <td> <?php echo $ligne["playerID"] ; ?> </td>
            <td> <?php echo $ligne["id"] ; ?> </td>
            <td style="background-color:<?= $color?>;color:black;"> <?php echo $ligne["role"] ; ?> </td>
            <td style="background-color:<?= $colorrank?>;color:black;"> <?php echo $ligne["HR"] ; ?> </td>
        </tr>
    <?php }?>
</table>