<?php
    include("../control_if_user_is_connected.php");
    $query = "SELECT * FROM rendez_vous
    INNER JOIN patient ON id_patient = id_patient_fk_rendez_vous
    INNER JOIN personne ON id_personne_fk_patient=id_personne
    INNER JOIN specialite ON id_specialite_fk_rendez_vous = id_specialite
    WHERE del_rendez_vous='0' AND id_rendez_vous = ?";

    $statement = $bdd->prepare($query);
    $statement->execute(array($_POST["id_view"]));
    $result = $statement->fetchAll();
    $output = '
    <div class="table-responsive">
        <table class="table">';

    foreach ($result as $row) {
        $output .= '
        <tr>
            <td>Date du rendez-vous</td>
            <td>' . date("d-m-Y", strtotime($row["date_rendez_vous"])) . ' à ' . date("H:i", strtotime($row["date_rendez_vous"])) . '</td>
        </tr>
        <tr>
            <td>Patient</td>
            <td>' . $row["nom_personne"] ." ".$row["prenom_personne"] . '</td>
        </tr>
        <tr>
            <td>Date du début des symptômes</td>
            <td>' . $row["date_debut_symptome_rendez_vous"] . '</td>
        </tr>
            <td>Symptômes</td>
            <td>' . $row["symptomes_rendez_vous"] . '</td>
        </tr>
        <tr>
            <td>Téléphone</td>
            <td>' . $row["tel_personne"] . '</td>
        </tr>
        <tr>
            <td>Paiement</td>
            <td>' . $row["paiement_rendez_vous"] . '</td>
        </tr>
        <tr>
            <td>Montant payé</td>
            <td>' . $row["montant_paye_rendez_vous"] . '</td>
        </tr>
        <tr>
            <td>Notes</td>
            <td>' . $row["notes_rendez_vous"] . '</td>
        </tr>
        <tr>
            <td>Statut</td>
            <td>';
        if($row['statut_rendez_vous']=="Actif"){
            $output .= "<span class='badge badge-pill badge-success mb-1'>".$row['statut_rendez_vous']."</span>";
        }
        else if($row['statut_rendez_vous']=="Inactif"){
            $output .= "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_rendez_vous']."</span>";
        }
        $output .= '</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>' . date("d-m-Y", strtotime($row["date_create_rendez_vous"])) . ' à ' . date("H:i", strtotime($row["date_create_rendez_vous"])) . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié le</td>
            <td>' . date("d-m-Y", strtotime($row["date_last_modif_rendez_vous"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_rendez_vous"])) . '</td>
        </tr>
        <tr>
            <td>Enregistrée par</td>
            <td>' . $row['user_create_rendez_vous'] . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié par</td>
            <td>' . $row['user_create_rendez_vous'] . '</td>
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