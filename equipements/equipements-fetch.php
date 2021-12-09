<?php
    include("../control_if_user_is_connected.php");

    // noms des colonnes dans l'ordre
    $colonne = array("photo_equipement", "nom_equipement", "nom_departement", "stored_equipement", "statut_equipement");

    $query = "";

    $output = array();

    $query .= "SELECT * FROM equipement INNER JOIN departement ON id_departement = id_departement_fk_equipement WHERE del_equipement = '0' "; // changer

    if(isset($_POST["search"]["value"]))
    {	// changer les colonnes à rechercher
        $query .= 'AND ( nom_equipement LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR nom_departement LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR stored_equipement LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR statut_equipement LIKE "%'.$_POST["search"]["value"].'%" ) ';
    }

    // Filtrage dans le tableau
    if(isset($_POST['order']))
    {
        $query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
        $query .= 'ORDER BY id_equipement DESC ';
    }

    if($_POST['length'] != -1)
    {
        $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $statement = $bdd->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $data = array();

    $filtered_rows = $statement->rowCount();

    foreach($result as $row)
    {
        $sub_array = array(); // tenir compte de l'ordre dans le tableau
        $sub_array[] = "<div style='width: 40px; height: 40px; overflow: hidden; border-radius: 50%;'><img style='height: 100%; margin: auto;' src='../img/personnes/".$row['photo_equipement']."'></div>";
        $sub_array[] = $row['nom_equipement'];
        $sub_array[] = $row['nom_departement'];
        $sub_array[] = $row['stored_equipement'];
        if($row['statut_equipement']=="Actif"){
            $sub_array[] = "<span class='badge badge-pill badge-success mb-1'>".$row['statut_equipement']."</span>";
        }
        else if($row['statut_equipement']=="Inactif"){
            $sub_array[] = "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_equipement']."</span>";
        }
        $actions = '<div class="btn-group">
        <button class="btn btn-light btn-sm dropdown-toggle" data-target=".down'.$row["id_equipement"].'" type="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
          Actions<i class="ik ik-chevron-down"></i>
        </button>
        <div class="collapse down'.$row["id_equipement"].'" style="position: absolute; top: 100%;right: 0px;z-index: 100;background-color: #eee;">
        <a href="#" class="dropdown-item view" id="'.$row["id_equipement"].'">Consulter</a>';
        if($_SESSION['id_type_compte'] <= 3){
            $actions .= "<a class='dropdown-item' href='equipements-edit.php?id=".$row['id_equipement']."'>Modifier</a>";
        }
        if($_SESSION['id_type_compte'] <= 2){
            $actions .= "<a class='dropdown-item delete' href='#' id='".$row['id_equipement']."'>Supprimer</a>";
        }
        if($_SESSION['id_type_compte'] <= 1){
            if($row['statut_equipement']=="Actif"){
                $actions .= "<a class='dropdown-item' href='equipements-rendre-inactif.php?id=".$row['id_equipement']."'>Désactiver</a>";
            }
            else if($row['statut_equipement']=="Inactif"){
                $actions .= "<a class='dropdown-item' href='equipements-rendre-actif.php?id=".$row['id_equipement']."'>Activer</a>";
            }
        }
        $actions .= '</div>
        </div>';
        $sub_array[] = $actions;
                
        $data[] = $sub_array;
    }

    function get_total_all_records($bdd)
    {
        $statement = $bdd->prepare("SELECT * FROM equipement INNER JOIN departement ON id_departement = id_departement_fk_equipement WHERE del_equipement = '0'"); // same query as above
        $statement->execute();
        return $statement->rowCount();
    }

    $output = array(
        "draw"			=>	intval($_POST["draw"]),
        "recordsTotal"  	=>  get_total_all_records($bdd),
        "recordsFiltered" 	=> 	$filtered_rows,
        "data"				=>	$data
    );

    echo json_encode($output);
?>