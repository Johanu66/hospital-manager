<?php
    include("../control_if_user_is_connected.php");

    // noms des colonnes dans l'ordre
    $colonne = array("date_depense", "nom_depense", "nom_departement", "montant_depense", "statut_depense");

    $query = "";

    $output = array();

    $query .= "SELECT * FROM depense INNER JOIN departement ON id_departement_fk_depense=id_departement WHERE del_depense='0' "; // changer

    if(isset($_POST["search"]["value"]))
    {	// changer les colonnes à rechercher
        $query .= "AND ( CONCAT(date_depense, '') LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_depense LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_departement LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CONCAT(montant_depense, '') LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CONCAT(statut_depense, '') LIKE '%".$_POST['search']['value']."%' ) ";
    }

    // Filtrage dans le tableau
    if(isset($_POST['order']))
    {
        $query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
        $query .= 'ORDER BY id_depense DESC ';
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
        $sub_array[] = date('d-m-Y', strtotime($row['date_depense']));
        $sub_array[] = $row['nom_depense'];
        $sub_array[] = $row['nom_departement'];
        $sub_array[] = $row['montant_depense'];
        if($row['statut_depense']=="Actif"){
            $sub_array[] = "<span class='badge badge-pill badge-success mb-1'>".$row['statut_depense']."</span>";
        }
        else if($row['statut_depense']=="Inactif"){
            $sub_array[] = "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_depense']."</span>";
        }
        $actions = '<div class="btn-group">
        <button class="btn btn-light btn-sm dropdown-toggle" data-target=".down'.$row["id_depense"].'" type="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
          Actions<i class="ik ik-chevron-down"></i>
        </button>
        <div class="collapse down'.$row["id_depense"].'" style="position: absolute; top: 100%;right: 0px;z-index: 100;background-color: #eee;">
        <a href="#" class="dropdown-item view" id="'.$row["id_depense"].'">Consulter</a>';
        if($_SESSION['id_type_compte'] <= 3){
            $actions .= "<a class='dropdown-item' href='depenses-edit.php?id=".$row['id_depense']."'>Modifier</a>";
        }
        if($_SESSION['id_type_compte'] <= 2){
            $actions .= "<a class='dropdown-item delete' href='#' id='".$row['id_depense']."'>Supprimer</a>";
        }
        if($_SESSION['id_type_compte'] <= 1){
            if($row['statut_depense']=="Actif"){
                $actions .= "<a class='dropdown-item' href='depenses-rendre-inactif.php?id=".$row['id_depense']."'>Désactiver</a>";
            }
            else if($row['statut_depense']=="Inactif"){
                $actions .= "<a class='dropdown-item' href='depenses-rendre-actif.php?id=".$row['id_depense']."'>Activer</a>";
            }
        }
        $actions .= '</div>
        </div>';
        $sub_array[] = $actions;
        $data[] = $sub_array;
    }

    function get_total_all_records($bdd)
    {
        $statement = $bdd->prepare("SELECT * FROM depense INNER JOIN departement ON id_departement_fk_depense=id_departement WHERE del_depense='0'"); // same query as above
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
?>