<?php
    include("../control_if_user_is_connected.php");
    include("../if_test_env_json.php");
    if(isset($_POST['id']) && !$_TEST_ENV){
        $now = new DateTime();
        update("batiment",[
            "del_batiment" => '1',
            "date_del_batiment" => $now->format('Y-m-d H:i:s'),
            "user_del_batiment" => $_SESSION['nom']." ".$_SESSION['prenom']
        ], " id_batiment = ".$_POST['id']);

        
        header('Content-Type: application/json');
        echo json_encode(" ");
        // Vérification d'erreur
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo 'Erreur JSON : ' . json_last_error_msg();
        }
    }