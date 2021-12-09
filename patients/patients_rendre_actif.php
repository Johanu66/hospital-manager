<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update(" patient INNER JOIN personne ON id_personne_fk_patient = id_personne ",[
            "statut_personne" => "Actif"
        ]," id_patient = '".$_GET['id']."'");
        $statement = $bdd->prepare("SELECT * FROM patient INNER JOIN personne ON id_personne_fk_patient = id_personne  WHERE id_patient = ?");
        $statement->execute(array($_GET['id']));
        $result = $statement->fetch();
        header("Location:patients.php?success=Le patient ".$result['nom_personne']." ".$result['prenom_personne']." est désormais actif.");
    }