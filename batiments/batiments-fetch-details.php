<?php
    include("../control_if_user_is_connected.php");
    $query = "SELECT * FROM batiment
    WHERE del_batiment='0' AND id_batiment = ?";

    $statement = $bdd->prepare($query);
    $statement->execute(array($_POST["id_view"]));
    $result = $statement->fetchAll();
    $output = '
    <div class="table-responsive">
        <table class="table">
    ';

    //$nom_batiment ='';

    foreach ($result as $row) {
        $output .= '
        <tr>
            <td>Photo du bâtiment</td>
            <td><div style="width: 80px; height: 80px; overflow: hidden; border-radius: 50%;"><img style="height: 100%; margin: auto;" src="../img/personnes/'.$row['photo_batiment'].'"></div></td>
        </tr>
        <tr>
            <td>Description</td>
            <td>' . $row["desc_batiment"] . '</td>
        </tr>
        <tr>
            <td>Statut</td>
            <td>';
        if($row['statut_batiment']=="Actif"){
            $output .= "<span class='badge badge-pill badge-success mb-1'>".$row['statut_batiment']."</span>";
        }
        else if($row['statut_batiment']=="Inactif"){
            $output .= "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_batiment']."</span>";
        }
        $output .= '</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>' . date("d-m-Y", strtotime($row["date_create_batiment"])) . ' à ' . date("H:i", strtotime($row["date_create_batiment"])) . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié le</td>
            <td>' . date("d-m-Y", strtotime($row["date_last_modif_batiment"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_batiment"])) . '</td>
        </tr>
        <tr>
            <td>Enregistrée par</td>
            <td>' . $row['user_create_batiment'] . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié par</td>
            <td>' . $row['user_create_batiment'] . '</td>
        </tr>
        ';
    }


    $output .= '
        </table>
    </div>
    ';
    
    header('Content-Type: application/json');
    echo json_encode($output);
    // Vérification d'erreur
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo 'Erreur JSON : ' . json_last_error_msg();
    }