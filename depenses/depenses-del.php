<?php
    include("../control_if_user_is_connected.php");
    if(isset($_POST['id'])){
        $now = new DateTime();
        update("depense",[
            "del_depense" => '1',
            "date_del_depense" => $now->format('Y-m-d H:i:s'),
            "user_del_depense" => $_SESSION['nom']." ".$_SESSION['prenom']
        ], " id_depense = ".$_POST['id']);

        
        header('Content-Type: application/json');
        echo json_encode(" ");
        // Vérification d'erreur
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo 'Erreur JSON : ' . json_last_error_msg();
        }
    }