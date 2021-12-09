<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update(" specialite ",[
            "statut_specialite" => "Inactif"
        ]," id_specialite = '".$_GET['id']."'");
        $statement = $bdd->prepare("SELECT * FROM specialite WHERE id_specialite = ?");
        $statement->execute(array($_GET['id']));
        $result = $statement->fetch();
        header("Location:specialites.php?success=La spécialité ".$result['nom_specialite']." est désormais inactif.");
    }