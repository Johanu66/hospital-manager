<?php
    include("../control_if_user_is_connected.php");
    $query = "SELECT * FROM recette
    INNER JOIN prestation ON id_prestation_fk_recette=id_prestation
    INNER JOIN departement ON id_departement = id_departement_fk_prestation
    INNER JOIN patient ON id_patient_fk_recette=id_patient
    INNER JOIN personne ON id_personne_fk_patient=id_personne
    WHERE del_recette='0' AND id_recette = ?";

    $statement = $bdd->prepare($query);
    $statement->execute(array($_POST["id_view"]));
    $result = $statement->fetchAll();
    $output = '
    <div class="table-responsive">
        <table class="table">
    ';

    //$nom_personne ='';

    foreach ($result as $row) {
        $output .= '
        <tr>
            <td>Date</td>
            <td>' . date("d-m-Y", strtotime($row['date_recette'])) . '</td>
        </tr>
        <tr>
            <td>Patient</td>
            <td>' . $row["nom_personne"] ." ".$row["prenom_personne"] . '</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>' . $row["email_personne"] . '</td>
        </tr>
        <tr>
            <td>Téléphone</td>
            <td>' . $row["tel_personne"] . '</td>
        </tr>
        <tr>
            <td>Adresse</td>
            <td>' . $row["adresse_personne"] . '</td>
        </tr>
        <tr>
            <td>Service</td>
            <td>' . $row["nom_departement"] . '</td>
        </tr>
        <tr>
            <td>Prestation</td>
            <td>' . $row["nom_prestation"] . '</td>
        </tr>
        <tr>
            <td>Montant</td>
            <td>' . $row["montant_prestation"] . '</td>
        </tr>
        <tr>
            <td>Patient assuré ?</td>
            <td>' . $row["patient_assure_recette"] . '</td>
        </tr>';
        if($row["patient_assure_recette"]=="Oui"){
            $output .= '
                <tr>
                    <td>Assureur</td>
                    <td>' . $row['assureur_recette'] . '</td>
                </tr>
                <tr>
                    <td>Montant payé par l\'assuré</td>
                    <td>' . $row["montant_paye_par_assureur_recette"] . '</td>
                </tr>';
        }
        $output .= '<tr>
            <td>Notes</td>
            <td>' . $row["notes_recette"] . '</td>
        </tr>
        <tr>
            <td>Statut</td>
            <td>';
        if($row['statut_recette']=="Actif"){
            $output .= "<span class='badge badge-pill badge-success mb-1'>".$row['statut_recette']."</span>";
        }
        else if($row['statut_recette']=="Inactif"){
            $output .= "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_recette']."</span>";
        }
        $output .= '</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>' . date("d-m-Y", strtotime($row["date_create_recette"])) . ' à ' . date("H:i", strtotime($row["date_create_personne"])) . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié le</td>
            <td>' . date("d-m-Y", strtotime($row["date_last_modif_recette"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_personne"])) . '</td>
        </tr>
        <tr>
            <td>Enregistrée par</td>
            <td>' . $row['user_create_recette'] . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié par</td>
            <td>' . $row['user_create_recette'] . '</td>
        </tr>
        ';
    }


    $output .= '
        </table>
    </div>
    ';
    echo json_encode($output);