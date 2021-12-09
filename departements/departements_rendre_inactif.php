<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update(" departement ",[
            "statut_departement" => "Inactif"
        ]," id_departement = '".$_GET['id']."'");
        $statement = $bdd->prepare("SELECT * FROM departement WHERE id_departement = ?");
        $statement->execute(array($_GET['id']));
        $result = $statement->fetch();
        header("Location:departements.php?success=Le département ".$result['nom_departement']." est désormais inactif.");
    }