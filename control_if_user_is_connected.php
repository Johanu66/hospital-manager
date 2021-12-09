<?php
    include("../db.php");
    include("../fonctions.php");
    include("../fonctions_sql.php");
    session_start();
    if(isset($_SESSION["id"])){
        
    }
    else if(isset($_COOKIE['email'],$_COOKIE['mdp']) AND !empty($_COOKIE['email']) AND !empty($_COOKIE['mdp'])){
        $statement = $bdd->prepare("SELECT * FROM compte INNER JOIN personne ON compte.id_personne_fk_compte = personne.id_personne WHERE email_personne = :email");
        $statement->execute(array(':email'	=>	$_COOKIE['email']));
        if($statement->rowCount() > 0){
            $mdp_correct = false;
            while($row = $statement->fetch()){
                if($_COOKIE['mdp'] == $row["mdp_compte"]){
                    if($row["statut_compte"] == "Actif"){
                        $_SESSION['id'] = $row['id_personne'];
                        $_SESSION["nom"] = $row["nom_personne"];
                        $_SESSION["prenom"] = $row["prenom_personne"];
                        $_SESSION["email"] = $row["email_personne"];
                        $_SESSION["id_type_compte"] = $row["id_type_compte_fk_compte"];
                        $_SESSION["photo"] = $row["photo_personne"];
                        $_SESSION["menu"] = get_menu_by_compte($row['id_compte']);
                    }
                    else{
                        ?>
                        <script>swal("Échoué","Votre compte est Inatif veuillez contacter l'administrateur.","error") </script>
                        <?php
                    }
                    $mdp_correct = true;
                }
            }
            if($mdp_correct == false){
                header("Location:../connexion.php");
            }
        }
        else{
            header("Location:../connexion.php");
        }
    }
    else{
        header("Location:../connexion.php");
    }
?>