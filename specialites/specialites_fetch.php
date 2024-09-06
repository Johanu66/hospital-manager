<?php
    include("../control_if_user_is_connected.php");

    // noms des colonnes dans l'ordre
    $colonne = array("id_specialite", "nom_specialite", "desc_specialite", "statut_specialite");

    $query = "";

    $output = array();

    $query .= "SELECT * FROM specialite "; // changer

    if(isset($_POST["search"]["value"]))
    {	// changer les colonnes à rechercher
        $query .= "WHERE ( CONCAT(id_specialite, '') LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_specialite LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR desc_specialite LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CONCAT(statut_specialite, '') LIKE '%".$_POST['search']['value']."%' ) ";
    }

    // Filtrage dans le tableau
    if(isset($_POST['order']))
    {
        $query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
        $query .= 'ORDER BY id_specialite DESC ';
    }

    if($_POST['length'] != -1)
    {
        $query .= 'LIMIT ' . $_POST['length'].' OFFSET '. $_POST['start'] ;
    }

    $statement = $bdd->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $data = array();

    $filtered_rows = $statement->rowCount();

    foreach($result as $row)
    {
        $sub_array = array(); // tenir compte de l'ordre dans le tableau
        $sub_array[] = $row['nom_specialite'];
        $sub_array[] = $row['desc_specialite'];
        if($row['statut_specialite']=="Actif"){
            $sub_array[] = "<span class='badge badge-pill badge-success mb-1'>".$row['statut_specialite']."</span>";
        }
        else if($row['statut_specialite']=="Inactif"){
            $sub_array[] = "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_specialite']."</span>";
        }
        $actions = '<div class="btn-group">
        <button class="btn btn-light btn-sm dropdown-toggle" data-target=".down'.$row["id_specialite"].'" type="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
          Actions<i class="ik ik-chevron-down"></i>
        </button>
        <div class="collapse down'.$row["id_specialite"].'" style="position: absolute; top: 100%;right: 0px;z-index: 100;background-color: #eee;">
        <a href="#" class="dropdown-item view" id="'.$row["id_specialite"].'">Consulter</a>';
        if($_SESSION['id_type_compte'] <= 3){
            $actions .= "<a class='dropdown-item' href='specialites_edit.php?id=".$row['id_specialite']."'>Modifier</a>";
        }
        if($_SESSION['id_type_compte'] <= 2){
            $actions .= "<a class='dropdown-item delete' href='#' id='".$row['id_specialite']."'>Supprimer</a>";
        }
        if($_SESSION['id_type_compte'] <= 1){
            if($row['statut_specialite']=="Actif"){
                $actions .= "<a class='dropdown-item' href='specialites_rendre_inactif.php?id=".$row['id_specialite']."'>Désactiver</a>";
            }
            else if($row['statut_specialite']=="Inactif"){
                $actions .= "<a class='dropdown-item' href='specialites_rendre_actif.php?id=".$row['id_specialite']."'>Activer</a>";
            }
        }
        $actions .= '</div>
        </div>';
        $sub_array[] = $actions;
        $data[] = $sub_array;
    }

    function get_total_all_records($bdd)
    {
        $statement = $bdd->prepare("SELECT * FROM specialite"); // same query as above
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