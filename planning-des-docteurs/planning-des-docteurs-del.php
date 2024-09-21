<?php
    include("../control_if_user_is_connected.php");
    include("../if_test_env_json.php");
    if(isset($_POST['id']) && !$_TEST_ENV){
        $now = new DateTime();
        update("planning",[
            "del_planning" => '1',
            "date_del_planning" => $now->format('Y-m-d H:i:s'),
            "user_del_planning" => $_SESSION['nom']." ".$_SESSION['prenom']
        ], " id_planning = ".$_POST['id']);

        
        header('Content-Type: application/json');
        echo json_encode(" ");
        // Vérification d'erreur
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo 'Erreur JSON : ' . json_last_error_msg();
        }
    }