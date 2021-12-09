<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update(" personnel INNER JOIN personne ON id_personne_fk_personnel = id_personne ",[
            "statut_personne" => "Actif"
        ]," id_personnel = '".$_GET['id']."'");
        $statement = $bdd->prepare("SELECT * FROM personnel INNER JOIN personne ON id_personne_fk_personnel = id_personne  WHERE id_personnel = ?");
        $statement->execute(array($_GET['id']));
        $result = $statement->fetch();
        header("Location:personnels.php?success=Le personnel ".$result['nom_personne']." ".$result['prenom_personne']." est désormais actif.");
    }