<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update("equipement",[
            "statut_equipement" => "Inactif"
        ]," id_equipement = '".$_GET['id']."'");
        header("Location:equipements.php?success=Le équipement est désormais inactif.");
    }