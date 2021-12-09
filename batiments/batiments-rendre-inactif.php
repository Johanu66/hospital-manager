<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update("batiment",[
            "statut_batiment" => "Inactif"
        ]," id_batiment = '".$_GET['id']."'");
        header("Location:batiments.php?success=Le bâtiment est désormais inactif.");
    }