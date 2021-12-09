<?php
    include("../control_if_user_is_connected.php");
    $query = "SELECT * FROM departement INNER JOIN batiment ON id_batiment=id_batiment_fk_departement
    WHERE del_departement='0' AND id_departement = ?";

    $statement = $bdd->prepare($query);
    $statement->execute(array($_POST["id_view"]));
    $result = $statement->fetchAll();
    $output = '
    <div class="table-responsive">
        <table class="table">
    ';

    //$nom_departement ='';

    foreach ($result as $row) {
        $output .= '
        <tr>
            <td>Nom</td>
            <td>' . $row["nom_departement"] . '</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>' . $row["desc_departement"] . '</td>
        </tr>
        <tr>
            <td>Bâtiment du service</td>
            <td>' . $row["nom_batiment"] . '</td>
        </tr>
        <tr>
            <td>Statut</td>
            <td>';
        if($row['statut_departement']=="Actif"){
            $output .= "<span class='badge badge-pill badge-success mb-1'>".$row['statut_departement']."</span>";
        }
        else if($row['statut_departement']=="Inactif"){
            $output .= "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_departement']."</span>";
        }
        $output .= '</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>' . date("d-m-Y", strtotime($row["date_create_departement"])) . ' à ' . date("H:i", strtotime($row["date_create_departement"])) . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié le</td>
            <td>' . date("d-m-Y", strtotime($row["date_last_modif_departement"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_departement"])) . '</td>
        </tr>
        <tr>
            <td>Enregistrée par</td>
            <td>' . $row['user_create_departement'] . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié par</td>
            <td>' . $row['user_create_departement'] . '</td>
        </tr>
        ';
    }


    $output .= '
        </table>
    </div>
    ';
    echo json_encode($output);