<?php
    include("../control_if_user_is_connected.php");
    if(isset($_POST['id'])){
        $statement = $bdd->prepare("SELECT * FROM specialite WHERE id_specialite = ?");
        $statement->execute(array($_POST['id']));
        $result = $statement->fetch();

        $statement = $bdd->prepare("DELETE FROM specialite WHERE id_specialite = ?");
        $statement->execute(array($_POST['id']));
        echo json_encode($result['nom_specialite']);
    }