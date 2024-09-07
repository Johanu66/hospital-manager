<?php
    include("../db.php");
    $output = "<option value=''>---</option>";
    if(isset($_POST['id_departement_selected']) AND !empty($_POST['id_departement_selected'])){
        $statement = $bdd->prepare("SELECT * FROM prestation WHERE del_prestation = '0' AND id_departement_fk_prestation = ?");
        $statement->execute(array($_POST['id_departement_selected']));
        while($row = $statement->fetch()){
            $output .= "<option value='".$row['id_prestation']."'";
            if(isset($_POST['id_prestation'])){
                if($_POST['id_prestation']==$row['id_prestation']){
                    $output .= " selected ";
                }
            }
            $output .= ">".$row['nom_prestation']."</option>";
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($output);