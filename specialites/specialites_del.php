<?php
    include("../control_if_user_is_connected.php");
    include("../if_test_env_json.php");
    if(isset($_POST['id']) && !$_TEST_ENV){
        $statement = $bdd->prepare("SELECT * FROM specialite WHERE id_specialite = ?");
        $statement->execute(array($_POST['id']));
        $result = $statement->fetch();

        $statement = $bdd->prepare("DELETE FROM specialite WHERE id_specialite = ?");
        $statement->execute(array($_POST['id']));
        
        header('Content-Type: application/json');
        echo json_encode($result['nom_specialite']);
        // Vérification d'erreur
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo 'Erreur JSON : ' . json_last_error_msg();
        }
    }