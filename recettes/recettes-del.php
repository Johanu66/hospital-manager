<?php
    include("../control_if_user_is_connected.php");
    if(isset($_POST['id'])){
        $now = new DateTime();
        update("recette",[
            "del_recette" => '1',
            "date_del_recette" => $now->format('Y-m-d H:i:s'),
            "user_del_recette" => $_SESSION['nom']." ".$_SESSION['prenom']
        ], " id_recette = ".$_POST['id']);

        echo json_encode(" ");
    }