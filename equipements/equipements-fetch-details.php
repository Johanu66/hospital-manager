<?php
    include("../control_if_user_is_connected.php");
    $query = "SELECT * FROM equipement
    WHERE del_equipement='0' AND id_equipement = ?";
    $statement = $bdd->prepare($query);
    $statement->execute(array($_POST["id_view"]));
    $result1 = $statement->fetch();

    $query = "SELECT * FROM equipement
    INNER JOIN departement ON id_departement = id_departement_fk_equipement ";
    if($result1['stored_equipement']=="Oui"){
        $query .= "INNER JOIN magasin ON id_magasin = id_magasin_fk_equipement ";
    }
    $query .= "WHERE del_equipement='0' AND id_equipement = ?";
    $statement = $bdd->prepare($query);
    $statement->execute(array($_POST["id_view"]));
    $result = $statement->fetchAll();
    $output = '
    <div class="table-responsive">
        <table class="table">
    ';

    //$nom_equipement ='';

    foreach ($result as $row) {
        $output .= '
        <tr>
            <td>Photo du équipement</td>
            <td><div style="width: 80px; height: 80px; overflow: hidden; border-radius: 50%;"><img style="height: 100%; margin: auto;" src="../img/personnes/'.$row['photo_equipement'].'"></div></td>
        </tr>
        <tr>
            <td>Nom</td>
            <td>' . $row["nom_equipement"] . '</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>' . $row["desc_equipement"] . '</td>
        </tr>
        <tr>
            <td>Équipement emmagasiné ?</td>
            <td>' . $row["stored_equipement"] . '</td>
        </tr>';
        if($row["stored_equipement"]=="Oui"){ 
            $output .= '
            <tr>
                <td>Magasin</td>
                <td>'.$row["nom_magasin"].'</td>
            </tr>';
        }
            $output .= '
        <tr>
            <td>Notes</td>
            <td>' . $row["notes_equipement"] . '</td>
        </tr>
        <tr>
            <td>Statut</td>
            <td>';
        if($row['statut_equipement']=="Actif"){
            $output .= "<span class='badge badge-pill badge-success mb-1'>".$row['statut_equipement']."</span>";
        }
        else if($row['statut_equipement']=="Inactif"){
            $output .= "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_equipement']."</span>";
        }
        $output .= '</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>' . date("d-m-Y", strtotime($row["date_create_equipement"])) . ' à ' . date("H:i", strtotime($row["date_create_equipement"])) . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié le</td>
            <td>' . date("d-m-Y", strtotime($row["date_last_modif_equipement"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_equipement"])) . '</td>
        </tr>
        <tr>
            <td>Enregistrée par</td>
            <td>' . $row['user_create_equipement'] . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié par</td>
            <td>' . $row['user_create_equipement'] . '</td>
        </tr>
        ';
    }


    $output .= '
        </table>
    </div>
    ';
    echo json_encode($output);