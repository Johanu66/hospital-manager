<?php
    include("../db.php");
    $output = "";
    if(isset($_POST['id_prestation']) AND !empty($_POST['id_prestation'])){
        $statement = $bdd->prepare("SELECT * FROM prestation WHERE del_prestation = '0' AND id_prestation = ?");
        $statement->execute(array($_POST['id_prestation']));
        $row = $statement->fetch();
        $output = $row['montant_prestation'];
    }
    echo json_encode($output);