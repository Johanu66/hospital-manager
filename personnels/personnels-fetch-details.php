<?php
    include("../control_if_user_is_connected.php");
    $query = "SELECT * FROM personnel
    INNER JOIN personne ON id_personne_fk_personnel = id_personne
    WHERE id_personnel = ?";

    $statement = $bdd->prepare($query);
    $statement->execute(array($_POST["id_view"]));
    $result = $statement->fetchAll();
    $output = '
    <div class="table-responsive">
        <table class="table">
    ';


    foreach ($result as $row) {
        $statement = $bdd->prepare("SELECT nom_departement FROM departement
        INNER JOIN assoc_departement_and_personnel ON id_departement_fk_assoc_departement_and_personnel = id_departement
        WHERE del_assoc_departement_and_personnel = '0' AND id_personnel_fk_assoc_departement_and_personnel = ?");
        $statement->execute(array($row['id_personnel']));
        $sub_result = $statement->fetchAll();
        $departements = [];
        foreach($sub_result as $sub_row){
            $departements[] = $sub_row['nom_departement'];
        }
        $output .= '
        <tr>
            <td>Photo de profil</td>
            <td><div style="width: 80px; height: 80px; overflow: hidden; border-radius: 50%;"><img style="height: 100%; margin: auto;" src="../img/personnes/'.$row['photo_personne'].'"></div></td>
        </tr>
        <tr>
            <td>Civilité</td>
            <td>';
        if($row['sexe_personne']=="M"){
            $output .= "Monsieur";
        }
        else{
            $output .= "Madame";
        }
            
        $output .= '</td>
        </tr>
        <tr>
            <td>Nom</td>
            <td>' . $row["nom_personne"] . '</td>
        </tr>
        <tr>
            <td>Prénom</td>
            <td>' . $row["prenom_personne"] . '</td>
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
            <td>Catégorie</td>
            <td>' . $row["categorie_personnel"] . '</td>
        </tr>
        <tr>
            <td>Service</td>
            <td>' . implode(', ',$departements) . '</td>
        </tr>
        <tr>
            <td>Notes</td>
            <td>' . $row["notes_personnel"] . '</td>
        </tr>
        <tr>
            <td>Date de prise de fonction</td>
            <td>' . date("d-m-Y", strtotime($row["date_prise_fonction_personnel"])) . '</td>
        </tr>
        <tr>
            <td>Statut</td>
            <td>';
        if($row['statut_personne']=="Actif"){
            $output .= "<span class='badge badge-pill badge-success mb-1'>".$row['statut_personne']."</span>";
        }
        else if($row['statut_personne']=="Inactif"){
            $output .= "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_personne']."</span>";
        }
        $output .= '</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>' . date("d-m-Y", strtotime($row["date_create_personne"])) . ' à ' . date("H:i", strtotime($row["date_create_personne"])) . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié le</td>
            <td>' . date("d-m-Y", strtotime($row["date_last_modif_personne"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_personne"])) . '</td>
        </tr>
        <tr>
            <td>Enregistrée par</td>
            <td>' . $row['user_create_personne'] . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié par</td>
            <td>' . $row['user_create_personne'] . '</td>
        </tr>
        ';
    }


    $output .= '
        </table>
    </div>
    ';
    
    header('Content-Type: application/json');
    echo json_encode($output);