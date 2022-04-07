<?php
    include("../control_if_user_is_connected.php");

    // noms des colonnes dans l'ordre
    $colonne = array("photo_personne","sexe_personne", "nom_personne", "email_personne");

    $query = "";

    $output = array();

    $query .= "SELECT * FROM personne INNER JOIN docteur ON id_personne = id_personne_fk_docteur INNER JOIN departement ON id_departement_fk_docteur = id_departement "; // changer

    if(isset($_POST["search"]["value"]))
    {	// changer les colonnes à rechercher
        $query .= "WHERE ( CAST(id_personne AS TEXT) ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_personne ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR prenom_personne ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR email_personne ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR tel_personne ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR adresse_personne ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CAST(sexe_personne AS TEXT) ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CAST(date_naissance_personne AS TEXT) ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_departement ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CAST(date_prise_fonction_docteur AS TEXT) ILIKE '%".$_POST['search']['value']."%' ) ";
    }

    // Filtrage dans le tableau
    if(isset($_POST['order']))
    {
        $query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
        $query .= 'ORDER BY id_docteur DESC ';
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
        $sub_array[] = "<div style='width: 40px; height: 40px; overflow: hidden; border-radius: 50%;'>
            <img style='height: 100%; margin: auto;' src='../img/personnes/".$row['photo_personne']."'>
        </div>";

        if($row['sexe_personne']=="M"){
            $sub_array[] = "Mr";
        }
        else{
            $sub_array[] = "Mme";
        }
        $sub_array[] = $row['nom_personne'];
        $sub_array[] = $row['prenom_personne'];
        $sub_array[] = $row['nom_departement'];
        $sub_array[] = date("d-m-Y", strtotime($row['date_prise_fonction_docteur']));
        $sub_array[] = $row['email_personne'];
        $sub_array[] = $row['tel_personne'];

        if($row['statut_personne']=="Actif"){
            $sub_array[] = "<span class='badge badge-pill badge-success mb-1'>".$row['statut_personne']."</span>";
        }
        else if($row['statut_personne']=="Inactif"){
            $sub_array[] = "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_personne']."</span>";
        }
        
        $actions = '<div class="btn-group">
        <button class="btn btn-light btn-sm dropdown-toggle" data-target=".down'.$row["id_personne"].'" type="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
          Actions<i class="ik ik-chevron-down"></i>
        </button>
        <div class="collapse down'.$row["id_personne"].'" style="position: absolute; top: 100%;right: 0px;z-index: 100;background-color: #eee;">
        <a href="#" class="dropdown-item view" id="'.$row["id_docteur"].'">Consulter</a>';
        if($_SESSION['id_type_compte'] <= 3){
            $actions .= "<a class='dropdown-item' href='docteurs_edit.php?id=".$row['id_docteur']."'>Modifier</a>";
        }
        if($_SESSION['id_type_compte'] <= 2){
            $actions .= "<a class='dropdown-item delete' href='#' id='".$row['id_docteur']."'>Supprimer</a>";
        }
        if($_SESSION['id_type_compte'] <= 1){
            if($row['statut_personne']=="Actif"){
                $actions .= "<a class='dropdown-item' href='docteurs_rendre_inactif.php?id=".$row['id_docteur']."'>Désactiver</a>";
            }
            else if($row['statut_personne']=="Inactif"){
                $actions .= "<a class='dropdown-item' href='docteurs_rendre_actif.php?id=".$row['id_docteur']."'>Activer</a>";
            }
        }
        $actions .= '</div>
        </div>';
        $sub_array[] = $actions;
                
        $data[] = $sub_array;
    }

    function get_total_all_records($bdd)
    {
        $statement = $bdd->prepare("SELECT * FROM personne"); // same query as above
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