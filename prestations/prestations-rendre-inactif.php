<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update("prestation",[
            "statut_prestation" => "Inactif"
        ]," id_prestation = '".$_GET['id']."'");
        $statement = $bdd->prepare("SELECT * FROM prestation");
        $statement->execute(array($_GET['id']));
        $result = $statement->fetch();
        header("Location:prestations.php?success=La prestation ".$result['nom_prestation']." est désormais inactif.");
    }