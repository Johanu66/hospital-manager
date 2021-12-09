<?php
    include("../control_if_user_is_connected.php");
    $query = "SELECT * FROM magasin
    WHERE del_magasin='0' AND id_magasin = ?";

    $statement = $bdd->prepare($query);
    $statement->execute(array($_POST["id_view"]));
    $result = $statement->fetchAll();
    $output = '
    <div class="table-responsive">
        <table class="table">
    ';

    //$nom_magasin ='';

    foreach ($result as $row) {
        $output .= '
        <tr>
            <td>Photo du magasin</td>
            <td><div style="width: 80px; height: 80px; overflow: hidden; border-radius: 50%;"><img style="height: 100%; margin: auto;" src="../img/personnes/'.$row['photo_magasin'].'"></div></td>
        </tr>
        <tr>
            <td>Description</td>
            <td>' . $row["desc_magasin"] . '</td>
        </tr>
        <tr>
            <td>Statut</td>
            <td>';
        if($row['statut_magasin']=="Actif"){
            $output .= "<span class='badge badge-pill badge-success mb-1'>".$row['statut_magasin']."</span>";
        }
        else if($row['statut_magasin']=="Inactif"){
            $output .= "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_magasin']."</span>";
        }
        $output .= '</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>' . date("d-m-Y", strtotime($row["date_create_magasin"])) . ' à ' . date("H:i", strtotime($row["date_create_magasin"])) . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié le</td>
            <td>' . date("d-m-Y", strtotime($row["date_last_modif_magasin"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_magasin"])) . '</td>
        </tr>
        <tr>
            <td>Enregistrée par</td>
            <td>' . $row['user_create_magasin'] . '</td>
        </tr>
        <tr>
            <td>Dernièrement modifié par</td>
            <td>' . $row['user_create_magasin'] . '</td>
        </tr>
        ';
    }


    $output .= '
        </table>
    </div>
    ';
    echo json_encode($output);