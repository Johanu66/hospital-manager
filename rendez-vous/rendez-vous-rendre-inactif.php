<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update("rendez_vous",[
            "statut_rendez_vous" => "Inactif"
        ]," id_rendez_vous = '".$_GET['id']."'");
        /*$statement = $bdd->prepare("SELECT * FROM recette");
        $statement->execute(array($_GET['id']));
        $result = $statement->fetch();*/
        header("Location:rendez-vous.php?success=Le rendez-vous est désormais inactif.");
    }