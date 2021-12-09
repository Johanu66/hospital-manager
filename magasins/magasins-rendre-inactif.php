<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update("magasin",[
            "statut_magasin" => "Inactif"
        ]," id_magasin = '".$_GET['id']."'");
        header("Location:magasins.php?success=Le magasin est désormais inactif.");
    }