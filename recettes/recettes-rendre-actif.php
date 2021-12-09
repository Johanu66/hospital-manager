<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update("recette",[
            "statut_recette" => "Actif"
        ]," id_recette = '".$_GET['id']."'");
        /*$statement = $bdd->prepare("SELECT * FROM recette");
        $statement->execute(array($_GET['id']));
        $result = $statement->fetch();*/
        header("Location:recettes.php?success=La recette est désormais actif.");
    }