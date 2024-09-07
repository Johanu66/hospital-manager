<?php
    include("../control_if_user_is_connected.php");

    // noms des colonnes dans l'ordre
    $colonne = array("id_departement", "nom_departement", "nom_batiment", "desc_departement", "statut_departement");

    $query = "";

    $output = array();

    $query .= "SELECT * FROM departement INNER JOIN batiment ON id_batiment=id_batiment_fk_departement WHERE del_departement='0' "; // changer

    if(isset($_POST["search"]["value"]))
    {	// changer les colonnes à rechercher
        $query .= "AND ( CONCAT(id_departement, '') LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_departement LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR desc_departement LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_batiment LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CONCAT(statut_departement, '') LIKE '%".$_POST['search']['value']."%' ) ";
    }

    // Filtrage dans le tableau
    if(isset($_POST['order']))
    {
        $query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
        $query .= 'ORDER BY id_departement DESC ';
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
        $sub_array[] = $row['nom_departement'];
        $sub_array[] = $row['desc_departement'];
        $sub_array[] = $row['nom_batiment'];
        if($row['statut_departement']=="Actif"){
            $sub_array[] = "<span class='badge badge-pill badge-success mb-1'>".$row['statut_departement']."</span>";
        }
        else if($row['statut_departement']=="Inactif"){
            $sub_array[] = "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_departement']."</span>";
        }
        $actions = '<div class="btn-group">
        <button class="btn btn-light btn-sm dropdown-toggle" data-target=".down'.$row["id_departement"].'" type="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
          Actions<i class="ik ik-chevron-down"></i>
        </button>
        <div class="collapse down'.$row["id_departement"].'" style="position: absolute; top: 100%;right: 0px;z-index: 100;background-color: #eee;">
        <a href="#" class="dropdown-item view" id="'.$row["id_departement"].'">Consulter</a>';
        if($_SESSION['id_type_compte'] <= 3){
            $actions .= "<a class='dropdown-item' href='departements_edit.php?id=".$row['id_departement']."'>Modifier</a>";
        }
        if($_SESSION['id_type_compte'] <= 2){
            $actions .= "<a class='dropdown-item delete' href='#' id='".$row['id_departement']."'>Supprimer</a>";
        }
        if($_SESSION['id_type_compte'] <= 1){
            if($row['statut_departement']=="Actif"){
                $actions .= "<a class='dropdown-item' href='departements_rendre_inactif.php?id=".$row['id_departement']."'>Désactiver</a>";
            }
            else if($row['statut_departement']=="Inactif"){
                $actions .= "<a class='dropdown-item' href='departements_rendre_actif.php?id=".$row['id_departement']."'>Activer</a>";
            }
        }
        $actions .= '</div>
        </div>';
        $sub_array[] = $actions;
        $data[] = $sub_array;
    }

    function get_total_all_records($bdd)
    {
        $statement = $bdd->prepare("SELECT * FROM departement INNER JOIN batiment ON id_batiment=id_batiment_fk_departement WHERE del_departement='0'"); // same query as above
        $statement->execute();
        return $statement->rowCount();
    }

    $output = array(
        "draw"			=>	intval($_POST["draw"]),
        "recordsTotal"  	=>  get_total_all_records($bdd),
        "recordsFiltered" 	=> 	$filtered_rows,
        "data"				=>	$data
    );

    
    header('Content-Type: application/json');
    echo json_encode($output);
    // Vérification d'erreur
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo 'Erreur JSON : ' . json_last_error_msg();
    }
?>
