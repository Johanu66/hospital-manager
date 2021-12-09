<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update("rendez_vous",[
            "statut_rendez_vous" => "Actif"
        ]," id_rendez_vous = '".$_GET['id']."'");
        header("Location:rendez-vous.php?success=Le rendez-vous est désormais actif.");
    }