<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update(" docteur INNER JOIN personne ON id_personne_fk_docteur = id_personne ",[
            "statut_personne" => "Inactif"
        ]," id_docteur = '".$_GET['id']."'");
        $statement = $bdd->prepare("SELECT * FROM docteur INNER JOIN personne ON id_personne_fk_docteur = id_personne  WHERE id_docteur = ?");
        $statement->execute(array($_GET['id']));
        $result = $statement->fetch();
        header("Location:docteurs.php?success=Le docteur ".$result['nom_personne']." ".$result['prenom_personne']." est désormais inactif.");
    }