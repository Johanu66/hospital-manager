<?php
    include("../control_if_user_is_connected.php");
    $query = "SELECT * FROM depense
    INNER JOIN departement ON id_departement_fk_depense=id_departement
    WHERE del_depense='0' AND id_depense = ?";

    $statement = $bdd->prepare($query);
    $statement->execute(array($_POST["id_view"]));
    $result = $statement->fetchAll();
    $output = '
    <div class="table-responsive">
        <table class="table">
    ';

    //$nom_depense ='';

    foreach ($result as $row) {
        $output .= '
        <tr>
            <td>Date</td>
            <td>' . $row["date_depense"] . '</td>
        </tr>
        <tr>
            <td>Nom</td>
            <td>' . $row["nom_depense"] . '</td>
        </tr>
        <tr>
            <td>Service</td>
            <td>' . $row["nom_departement"] . '</td>
        </tr>
        <tr>
            <td>Montant</td>
            <td>' . $row["montant_depense"] . '</td>
        </tr>
        <tr>
            <td>Notes</td>
            <td>' . $row["notes_depense"] . '</td>
        </tr>
        <tr>
            <td>Statut</td>
            <td>';
        if($row['statut_depense']=="Actif"){
            $output .= "<span class='badge badge-pill badge-success mb-1'>".$row['statut_depense']."</span>";
        }
        else if($row['statut_depense']=="Inactif"){
            $output .= "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_depense']."</span>";
        }
        $output .= '</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>' . date("d-m-Y", strtotime($row["date_create_depense"])) . ' à ' . date("H:i", strtotime($row["date_create_depense"])) . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié le</td>
            <td>' . date("d-m-Y", strtotime($row["date_last_modif_depense"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_depense"])) . '</td>
        </tr>
        <tr>
            <td>Enregistrée par</td>
            <td>' . $row['user_create_depense'] . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié par</td>
            <td>' . $row['user_create_depense'] . '</td>
        </tr>
        ';
    }


    $output .= '
        </table>
    </div>
    ';
    
    header('Content-Type: application/json');
    echo json_encode($output);