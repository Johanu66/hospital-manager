<?php
    include("../control_if_user_is_connected.php");

    // noms des colonnes dans l'ordre
    $colonne = array("date_rendez_vous", "nom_personne", "nom_specialite", "tel_personne", "paiement_rendez_vous", "montant_paye_rendez_vous", "statut_rendez_vous");

    $query = "";

    $output = array();

    $query .= "SELECT * FROM rendez_vous INNER JOIN patient ON id_patient = id_patient_fk_rendez_vous INNER JOIN personne ON id_personne_fk_patient=id_personne INNER JOIN specialite ON id_specialite_fk_rendez_vous = id_specialite WHERE del_rendez_vous='0' "; // changer

    if(isset($_POST["search"]["value"]))
    {	// changer les colonnes à rechercher
        $query .= "AND ( CAST(date_rendez_vous AS TEXT) ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_personne ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR prenom_personne ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR nom_specialite ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR symptomes_rendez_vous ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR tel_personne ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CAST(paiement_rendez_vous AS TEXT) ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CAST(montant_paye_rendez_vous AS TEXT) ILIKE '%".$_POST['search']['value']."%' ";
        $query .= "OR CAST(statut_rendez_vous AS TEXT) ILIKE '%".$_POST['search']['value']."%' ) ";
    }

    // Filtrage dans le tableau
    if(isset($_POST['order']))
    {
        $query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
        $query .= 'ORDER BY id_rendez_vous DESC ';
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
        $sub_array[] = date("d-m-Y", strtotime($row["date_rendez_vous"])) . ' à ' . date("H:i", strtotime($row["date_rendez_vous"]));
        $sub_array[] = $row['nom_personne']." ".$row['prenom_personne'];
        $sub_array[] = $row['nom_specialite'];
        $sub_array[] = $row['tel_personne'];
        $sub_array[] = $row['paiement_rendez_vous'];
        $sub_array[] = $row['montant_paye_rendez_vous'];
        $now = new DateTime();
        $old_date = new DateTime($row["date_rendez_vous"]);
        if($old_date < $now){
            $sub_array[] = "<span class='badge badge-pill badge-secondary mb-1'>Passé</span>";
        }
        else{
            if($row['statut_rendez_vous']=="Actif"){
                $sub_array[] = "<span class='badge badge-pill badge-success mb-1'>".$row['statut_rendez_vous']."</span>";
            }
            else if($row['statut_rendez_vous']=="Inactif"){
                $sub_array[] = "<span class='badge badge-pill badge-danger mb-1'>".$row['statut_rendez_vous']."</span>";
            }
        }
        $actions = '<div class="btn-group">
        <button class="btn btn-light btn-sm dropdown-toggle" data-target=".down'.$row["id_rendez_vous"].'" type="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
          Actions<i class="ik ik-chevron-down"></i>
        </button>
        <div class="collapse down'.$row["id_rendez_vous"].'" style="position: absolute; top: 100%;right: 0px;z-index: 100;background-color: #eee;">
        <a href="#" class="dropdown-item view" id="'.$row["id_rendez_vous"].'">Consulter</a>';
        if($_SESSION['id_type_compte'] <= 3){
            $actions .= "<a class='dropdown-item' href='rendez-vous-edit.php?id=".$row['id_rendez_vous']."'>Modifier</a>";
        }
        if($_SESSION['id_type_compte'] <= 2){
            $actions .= "<a class='dropdown-item delete' href='#' id='".$row['id_rendez_vous']."'>Supprimer</a>";
        }
        if($_SESSION['id_type_compte'] <= 1){
            if($row['statut_rendez_vous']=="Actif"){
                $actions .= "<a class='dropdown-item' href='rendez-vous-rendre-inactif.php?id=".$row['id_rendez_vous']."'>Désactiver</a>";
            }
            else if($row['statut_rendez_vous']=="Inactif"){
                $actions .= "<a class='dropdown-item' href='rendez-vous-rendre-actif.php?id=".$row['id_rendez_vous']."'>Activer</a>";
            }
        }
        $actions .= '</div>
        </div>';
        $sub_array[] = $actions;
                
        $data[] = $sub_array;
    }

    function get_total_all_records($bdd)
    {
        $statement = $bdd->prepare("SELECT * FROM rendez_vous INNER JOIN patient ON id_patient = id_patient_fk_rendez_vous INNER JOIN personne ON id_personne_fk_patient=id_personne INNER JOIN specialite ON id_specialite_fk_rendez_vous = id_specialite WHERE del_rendez_vous='0'"); // same query as above
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