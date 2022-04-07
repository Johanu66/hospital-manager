<?php
    include("../control_if_user_is_connected.php");

    // noms des colonnes dans l'ordre
    $colonne = array("nom_prestation", "nom_departement", "montant_prestation","statut_prestation");

    $query = "";

    $output = array();

    $query .= "SELECT * FROM prestation INNER JOIN departement ON id_departement = id_departement_fk_prestation WHERE del_prestation='0' "; // changer

    if(isset($_POST["search"]["value"]))
    {	// changer les colonnes à rechercher
        $query .= "AND ( CAST(id_prestation AS TEXT) ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_prestation ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_departement ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR montant_prestation ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR notes_prestation ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR statut_prestation ILIKE '%".$_POST['search']['value']."%' ) ";
    }

    // Filtrage dans le tableau
    if(isset($_POST['order']))
    {
        $query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
        $query .= 'ORDER BY id_prestation DESC ';
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
        $sub_array[] = $row['nom_prestation'];
        $sub_array[] = $row['nom_departement'];
        $sub_array[] = $row['montant_prestation'];
        if($row['statut_prestation']=="Actif"){
            $sub_array[] = "<span class='badge badge-pill badge-success mb-1'>".$row['statut_prestation']."</span>";
        }
        else if($row['statut_prestation']=="Inactif"){
            $sub_array[] = "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_prestation']."</span>";
        }
        $actions = '<div class="btn-group">
        <button class="btn btn-light btn-sm dropdown-toggle" data-target=".down'.$row["id_prestation"].'" type="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
          Actions<i class="ik ik-chevron-down"></i>
        </button>
        <div class="collapse down'.$row["id_prestation"].'" style="position: absolute; top: 100%;right: 0px;z-index: 100;background-color: #eee;">
        <a href="#" class="dropdown-item view" id="'.$row["id_prestation"].'">Consulter</a>';
        if($_SESSION['id_type_compte'] <= 3){
            $actions .= "<a class='dropdown-item' href='prestations-edit.php?id=".$row['id_prestation']."'>Modifier</a>";
        }
        if($_SESSION['id_type_compte'] <= 2){
            $actions .= "<a class='dropdown-item delete' href='#' id='".$row['id_prestation']."'>Supprimer</a>";
        }
        if($_SESSION['id_type_compte'] <= 1){
            if($row['statut_prestation']=="Actif"){
                $actions .= "<a class='dropdown-item' href='prestations-rendre-inactif.php?id=".$row['id_prestation']."'>Désactiver</a>";
            }
            else if($row['statut_prestation']=="Inactif"){
                $actions .= "<a class='dropdown-item' href='prestations-rendre-actif.php?id=".$row['id_prestation']."'>Activer</a>";
            }
        }
        $actions .= '</div>
        </div>';
        $sub_array[] = $actions;
                
        $data[] = $sub_array;
    }

    function get_total_all_records($bdd)
    {
        $statement = $bdd->prepare("SELECT * FROM prestation WHERE del_prestation='0'"); // same query as above
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
