<?php
    include("../control_if_user_is_connected.php");

    // noms des colonnes dans l'ordre
    $colonne = array("photo_personne", "nom_personne", "prenom_personne", "nom_specialite", "planning");

    $query = "";

    $output = array();

    $query .= "SELECT * FROM planning INNER JOIN docteur ON id_docteur = id_docteur_fk_planning INNER JOIN personne ON id_personne_fk_docteur=id_personne INNER JOIN departement ON id_departement_fk_docteur=id_departement WHERE del_planning='0' "; // changer

    if(isset($_POST["search"]["value"]))
    {	// changer les colonnes à rechercher
        $query .= "AND ( photo_personne LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_personne LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR prenom_personne LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_departement LIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CONCAT(planning, '') LIKE '%".$_POST['search']['value']."%' ) ";
    }

    // Filtrage dans le tableau
    if(isset($_POST['order']))
    {
        $query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
        $query .= 'ORDER BY id_planning DESC ';
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
        $sub_array[] = "<div style='width: 40px; height: 40px; overflow: hidden; border-radius: 50%;'><img style='height: 100%;' src='../img/personnes/".$row['photo_personne']."'></div>";
        $sub_array[] = $row['nom_personne'];
        $sub_array[] = $row['prenom_personne'];
        $sub_array[] = $row['nom_departement'];
        $sub_array[] = $row['planning'];
        $actions = '<div class="btn-group">
        <button class="btn btn-light btn-sm dropdown-toggle" data-target=".down'.$row["id_planning"].'" type="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
          Actions<i class="ik ik-chevron-down"></i>
        </button>
        <div class="collapse down'.$row["id_planning"].'" style="position: absolute; top: 100%;right: 0px;z-index: 100;background-color: #eee;">';
        if($_SESSION['id_type_compte'] <= 3){
            $actions .= "<a class='dropdown-item' href='planning-des-docteurs-edit.php?id=".$row['id_planning']."'>Modifier</a>";
        }
        if($_SESSION['id_type_compte'] <= 2){
            $actions .= "<a class='dropdown-item delete' href='#' id='".$row['id_planning']."'>Supprimer</a>";
        }
        $actions .= '</div>
        </div>';
        $sub_array[] = $actions;
                
        $data[] = $sub_array;
    }

    function get_total_all_records($bdd)
    {
        $statement = $bdd->prepare("SELECT * FROM planning INNER JOIN docteur ON id_docteur = id_docteur_fk_planning INNER JOIN personne ON id_personne_fk_docteur=id_personne INNER JOIN specialite ON id_specialite_fk_docteur=id_specialite WHERE del_planning='0'"); // same query as above
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