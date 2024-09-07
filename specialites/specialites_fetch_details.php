<?php
    include("../control_if_user_is_connected.php");
    $query = "SELECT * FROM specialite
    WHERE id_specialite = ?";

    $statement = $bdd->prepare($query);
    $statement->execute(array($_POST["id_view"]));
    $result = $statement->fetchAll();
    $output = '
    <div class="table-responsive">
        <table class="table">
    ';

    //$nom_specialite ='';

    foreach ($result as $row) {
        $output .= '
        <tr>
            <td>Nom</td>
            <td>' . $row["nom_specialite"] . '</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>' . $row["desc_specialite"] . '</td>
        </tr>
        <tr>
            <td>Statut</td>
            <td>';
        if($row['statut_specialite']=="Actif"){
            $output .= "<span class='badge badge-pill badge-success mb-1'>".$row['statut_specialite']."</span>";
        }
        else if($row['statut_specialite']=="Inactif"){
            $output .= "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_specialite']."</span>";
        }
        $output .= '</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>' . date("d-m-Y", strtotime($row["date_create_specialite"])) . ' à ' . date("H:i", strtotime($row["date_create_specialite"])) . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié le</td>
            <td>' . date("d-m-Y", strtotime($row["date_last_modif_specialite"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_specialite"])) . '</td>
        </tr>
        <tr>
            <td>Enregistrée par</td>
            <td>' . $row['user_create_specialite'] . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié par</td>
            <td>' . $row['user_create_specialite'] . '</td>
        </tr>
        ';
    }


    $output .= '
        </table>
    </div>
    ';
    
    header('Content-Type: application/json');
    echo json_encode($output);