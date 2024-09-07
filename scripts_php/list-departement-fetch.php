<?php
    include('../db.php');
    $output = array();
    $statement = $bdd->query("SELECT * FROM departement");
    $result = $statement->fetchAll();
    foreach($result as $row){
        $element = array();
        $element[] = $row['id_departement'];
        $element[] = $row['nom_departement'];
        $output[] = $element;
    }
    
    header('Content-Type: application/json');
    echo json_encode($output);