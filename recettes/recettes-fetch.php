<?php
    include("../control_if_user_is_connected.php");

    // noms des colonnes dans l'ordre
    $colonne = array("date_recette", "nom_departement", "nom_prestation","montant_prestation","nom_personne", "patient_assure_recette", "statut_recette");

    $query = "";

    $output = array();

    $query .= "SELECT * FROM recette INNER JOIN prestation ON id_prestation_fk_recette=id_prestation INNER JOIN departement ON id_departement = id_departement_fk_prestation INNER JOIN patient ON id_patient_fk_recette=id_patient INNER JOIN personne ON id_personne_fk_patient=id_personne WHERE del_recette='0' "; // changer

    if(isset($_POST["search"]["value"]))
    {	// changer les colonnes à rechercher
        $query .= "AND ( CAST(date_recette AS TEXT) ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_departement ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_prestation ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CAST(montant_prestation AS TEXT) ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_personne ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CAST(patient_assure_recette AS TEXT) ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CAST(statut_recette AS TEXT) ILIKE '%".$_POST['search']['value']."%' ) ";
    }

    // Filtrage dans le tableau
    if(isset($_POST['order']))
    {
        $query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
        $query .= 'ORDER BY id_recette DESC ';
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
        $sub_array[] = date("d-m-Y", strtotime($row['date_recette']));
        $sub_array[] = $row['nom_departement'];
        $sub_array[] = $row['nom_prestation'];
        $sub_array[] = $row['montant_prestation'];
        $sub_array[] = $row['nom_personne']." ".$row['prenom_personne'];
        $sub_array[] = $row['patient_assure_recette'];
        if($row['statut_recette']=="Actif"){
            $sub_array[] = "<span class='badge badge-pill badge-success mb-1'>".$row['statut_recette']."</span>";
        }
        else if($row['statut_recette']=="Inactif"){
            $sub_array[] = "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_recette']."</span>";
        }
        $actions = '<div class="btn-group">
        <button class="btn btn-light btn-sm dropdown-toggle" data-target=".down'.$row["id_recette"].'" type="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
          Actions<i class="ik ik-chevron-down"></i>
        </button>
        <div class="collapse down'.$row["id_recette"].'" style="position: absolute; top: 100%;right: 0px;z-index: 100;background-color: #eee;">
        <a href="#" class="dropdown-item view" id="'.$row["id_recette"].'">Consulter</a>';
        if($_SESSION['id_type_compte'] <= 3){
            $actions .= "<a class='dropdown-item' href='recettes-edit.php?id=".$row['id_recette']."'>Modifier</a>";
        }
        if($_SESSION['id_type_compte'] <= 2){
            $actions .= "<a class='dropdown-item delete' href='#' id='".$row['id_recette']."'>Supprimer</a>";
        }
        if($_SESSION['id_type_compte'] <= 1){
            if($row['statut_recette']=="Actif"){
                $actions .= "<a class='dropdown-item' href='recettes-rendre-inactif.php?id=".$row['id_recette']."'>Désactiver</a>";
            }
            else if($row['statut_recette']=="Inactif"){
                $actions .= "<a class='dropdown-item' href='recettes-rendre-actif.php?id=".$row['id_recette']."'>Activer</a>";
            }
        }
        $actions .= '</div>
        </div>';
        $sub_array[] = $actions;
                
        $data[] = $sub_array;
    }

    function get_total_all_records($bdd)
    {
        $statement = $bdd->prepare("SELECT * FROM recette INNER JOIN prestation ON id_prestation_fk_recette=id_prestation INNER JOIN departement ON id_departement = id_departement_fk_prestation INNER JOIN patient ON id_patient_fk_recette=id_patient INNER JOIN personne ON id_personne_fk_patient=id_personne WHERE del_recette='0' "); // same query as above
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