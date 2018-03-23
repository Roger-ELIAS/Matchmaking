<?php
require ("../json/jsonParse.php");

$tableau = getJsonData();

?>

<tr>
    <th>Pseudo</th>
    <th>ID</th>
</tr>

<?php
foreach($tableau as $ligne) {?>
        <tr>
            <td> <?php echo $ligne["playerID"] ; ?> </td>
            <td> <?php echo $ligne["id"] ; ?> </td>
        </tr>
<?php }?>
