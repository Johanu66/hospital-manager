<?php
    include("../control_if_user_is_connected.php");
    $query = "SELECT * FROM prestation
    INNER JOIN departement ON id_departement_fk_prestation = id_departement
    WHERE id_prestation = ?";

    $statement = $bdd->prepare($query);
    $statement->execute(array($_POST["id_view"]));
    $result = $statement->fetchAll();
    $output = '
    <div class="table-responsive">
        <table class="table">
    ';

    //$nom_prestation ='';

    foreach ($result as $row) {
        $output .= '
        <tr>
            <td>Nom</td>
            <td>' . $row["nom_prestation"] . '</td>
        </tr>
        <tr>
            <td>Montant</td>
            <td>' . $row["montant_prestation"] . '</td>
        </tr>
        <tr>
            <td>Service</td>
            <td>' . $row["nom_departement"] . '</td>
        </tr>
        <tr>
            <td>Notes</td>
            <td>' . $row["notes_prestation"] . '</td>
        </tr>
        <tr>
            <td>Statut</td>
            <td>';
        if($row['statut_prestation']=="Actif"){
            $output .= "<span class='badge badge-pill badge-success mb-1'>".$row['statut_prestation']."</span>";
        }
        else if($row['statut_prestation']=="Inactif"){
            $output .= "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_prestation']."</span>";
        }
        $output .= '</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>' . date("d-m-Y", strtotime($row["date_create_prestation"])) . ' à ' . date("H:i", strtotime($row["date_create_prestation"])) . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié le</td>
            <td>' . date("d-m-Y", strtotime($row["date_last_modif_prestation"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_prestation"])) . '</td>
        </tr>
        <tr>
            <td>Enregistrée par</td>
            <td>' . $row['user_create_prestation'] . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié par</td>
            <td>' . $row['user_create_prestation'] . '</td>
        </tr>
        ';
    }


    $output .= '
        </table>
    </div>
    ';
    echo json_encode($output);