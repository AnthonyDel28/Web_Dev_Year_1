<?php

// Page permettant de sélectionner une compagnie désirée et appartenant au Manager connecté

checkRole('manager');

global $connect;


$select = $connect->prepare('SELECT * FROM company WHERE managerid = ? ORDER BY name');
$select->execute([$_SESSION['userid']]);
$select->setFetchMode(PDO::FETCH_OBJ);

?>

<h2>Vos compagnies: </h2>
<form action="index.php?page=view/company/profile" method="POST">
    <select name="company" id="company" class="form-control" required>
        <?php
            foreach($select as $row){
                print '<option value='. $row->id .'>'. $row->name .'</option>';
            }
        ?>
    </select>
    <input type="submit" value="Sélectionner">
</form>
