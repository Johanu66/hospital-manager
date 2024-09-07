<?php
    include("../control_if_user_is_connected.php");
    if(isset($_POST['id'])){
        $statement = $bdd->prepare("SELECT * FROM patient INNER JOIN personne ON id_personne_fk_patient = id_personne  WHERE id_patient = ?");
        $statement->execute(array($_POST['id']));
        $result = $statement->fetch();

        $statement = $bdd->prepare("DELETE FROM patient WHERE id_patient = ?");
        $statement->execute(array($_POST['id']));

        $statement = $bdd->prepare("DELETE FROM personne WHERE id_personne = ?");
        $statement->execute(array($result['id_personne']));
        $patient = $result['nom_personne']." ".$result['prenom_personne'];
        
    header('Content-Type: application/json');
    echo json_encode($patient);
    }