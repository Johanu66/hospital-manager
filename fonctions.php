<?php
    function charger_specialite($id){
        include("db.php");
        $specialites = "";
        $statement2 = $bdd->query("SELECT * FROM specialite");
        while($row = $statement2->fetch()){
            $specialites .= "<option value='".$row['id_specialite']."'";
            if($row['id_specialite'] == $id){
                $specialites .= " selected ";
            }
            $specialites .= ">".$row['nom_specialite']."</option>";
        }
        return $specialites;
    }
    function charger_departement($id){
        include("db.php");
        $departements = "";
        $statement2 = $bdd->query("SELECT * FROM departement");
        while($row = $statement2->fetch()){
            $departements .= "<option value='".$row['id_departement']."'";
            if($row['id_departement'] == $id){
                $departements .= " selected ";
            }
            $departements .= ">".$row['nom_departement']."</option>";
        }
        return $departements;
    }
    
    function charger_batiment($id){
        include("db.php");
        $batiments = "";
        $statement2 = $bdd->query("SELECT * FROM batiment WHERE del_batiment = '0'");
        while($row = $statement2->fetch()){
            $batiments .= "<option value='".$row['id_batiment']."'";
            if($row['id_batiment'] == $id){
                $batiments .= " selected ";
            }
            $batiments .= ">".$row['nom_batiment']."</option>";
        }
        return $batiments;
    }

    function charger_departement_by_many_id($list_selected_id){
        include("db.php");
        $departements = "";
        $statement2 = $bdd->query("SELECT * FROM departement");
        while($row = $statement2->fetch()){
            $departements .= "<option value='".$row['id_departement']."'";
            if(in_array($row['id_departement'], $list_selected_id)){
                $departements .= " selected ";
            }
            $departements .= ">".$row['nom_departement']."</option>";
        }
        return $departements;
    }

    function charger_docteur($id){
        include("db.php");
        $docteurs = "";
        $statement2 = $bdd->query("SELECT * FROM docteur INNER JOIN personne ON id_personne_fk_docteur = id_personne");
        while($row = $statement2->fetch()){
            $docteurs .= "<option value='".$row['id_docteur']."'";
            if($row['id_docteur'] == $id){
                $docteurs .= " selected ";
            }
            $docteurs .= ">".$row['nom_personne']." ".$row['prenom_personne']." - ".$row['tel_personne']."</option>";
        }
        return $docteurs;
    }

    function charger_patient($id){
        include("db.php");
        $patients = "";
        $statement2 = $bdd->query("SELECT * FROM patient INNER JOIN personne ON id_personne_fk_patient = id_personne");
        while($row = $statement2->fetch()){
            $patients .= "<option value='".$row['id_patient']."'";
            if($row['id_patient'] == $id){
                $patients .= " selected ";
            }
            $patients .= ">".$row['nom_personne']." ".$row['prenom_personne']." - ".$row['tel_personne']."</option>";
        }
        return $patients;
    }

    
    function charger_magasin($id){
        include("db.php");
        $magasins = "";
        $statement2 = $bdd->query("SELECT * FROM magasin WHERE del_magasin='0'");
        while($row = $statement2->fetch()){
            $magasins .= "<option value='".$row['id_magasin']."'";
            if($row['id_magasin'] == $id){
                $magasins .= " selected ";
            }
            $magasins .= ">".$row['nom_magasin']."</option>";
        }
        return $magasins;
    }

?>