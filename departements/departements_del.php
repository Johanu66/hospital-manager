<?php
    include("../control_if_user_is_connected.php");
    if(isset($_POST['id'])){
        $statement = $bdd->prepare("SELECT * FROM departement WHERE id_departement = ?");
        $statement->execute(array($_POST['id']));
        $result = $statement->fetch();

        $statement = $bdd->prepare("DELETE FROM departement WHERE id_departement = ?");
        $statement->execute(array($_POST['id']));
        echo json_encode($result['nom_departement']);
    }