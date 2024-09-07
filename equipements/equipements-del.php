<?php
    include("../control_if_user_is_connected.php");
    if(isset($_POST['id'])){
        $now = new DateTime();
        update("equipement",[
            "del_equipement" => '1',
            "date_del_equipement" => $now->format('Y-m-d H:i:s'),
            "user_del_equipement" => $_SESSION['nom']." ".$_SESSION['prenom']
        ], " id_equipement = ".$_POST['id']);

        
    header('Content-Type: application/json');
    echo json_encode(" ");
    }