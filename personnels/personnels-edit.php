<?php
    include("../control_if_user_is_connected.php");
    $menu_personnels = "active";
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Gestion hospitalière</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="../plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="../plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="../plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="../plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="../plugins/c3/c3.min.css">
        <link rel="stylesheet" href="../plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../dist/css/theme.min.css">
        <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="../scripts_js/sweetalert/sweetalert.min.js"></script>
        <link rel="stylesheet" href="../assets/modules/select2/dist/css/select2.min.css">
    </head>

    <body>
        <div class="wrapper">
            <?php include("../parts/header.php") ?>
            <div class="page-wrap">
                <?php include("../parts/sidebar.php") ?>

                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-inbox bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Modification de personnel</h5>
                                            <span>En remplissant ce formulaire, vous pouvez modifier un personnel existant</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="/"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Personnel</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Modifier personnel</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['submit'])){
                                if(!empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['sexe']) && !empty($_POST['categorie']) && !empty($_POST['date_prise_fonction']) && !empty($_POST['adresse']) && !empty($_POST['tel']) && !empty($_POST['date_naissance']) && isset($_POST['departement'])>0){
                                    $id = htmlspecialchars($_POST['id']);
                                    $statement = $bdd->prepare("SELECT * FROM personne INNER JOIN personnel ON id_personne = id_personne_fk_personnel WHERE id_personnel = ?");
                                    $statement->execute(array($id));
                                    $value = $statement->fetch();
                                    $photo = $value['photo_personne'];
                                    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
                                    if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
                                    {
                                        // Testons si le fichier n'est pas trop gros
                                        if ($_FILES['photo']['size'] <= 1000000)
                                        {
                                            // Testons si l'extension est autorisée
                                            $infosfichier = pathinfo($_FILES['photo']['name']);
                                            $extension_upload = $infosfichier['extension'];
                                            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                                            if (in_array($extension_upload, $extensions_autorisees))
                                            {
                                                // On peut valider le fichier et le stocker définitivement
                                                $photo = htmlspecialchars(basename($_FILES['photo']['name']));
                                                move_uploaded_file($_FILES['photo']['tmp_name'], "../img/personnes/".$photo);
                                                
                                            }
                                            else{
                                                ?>
                                                <script>swal("Échoué", "Extension de la photo de profil n'est acceptable.", "error")</script>
                                                <?php
                                            }
                                        }
                                        else{
                                            ?>
                                            <script>swal("Échoué", "La photo de profil est trop volumineux.", "error")</script>
                                            <?php
                                        }            
                                    }
                                    $nom = htmlspecialchars($_POST['nom']);
                                    $prenom = htmlspecialchars($_POST['prenom']);
                                    $email = htmlspecialchars($_POST['email']);
                                    $sexe = htmlspecialchars($_POST['sexe']);
                                    $categorie = htmlspecialchars($_POST['categorie']);
                                    $date_prise_fonction = htmlspecialchars($_POST['date_prise_fonction']);
                                    $adresse = htmlspecialchars($_POST['adresse']);
                                    $tel = htmlspecialchars($_POST['tel']);
                                    $date_naissance = htmlspecialchars($_POST['date_naissance']);
                                    $notes = htmlspecialchars($_POST['notes']);
                                    $now = new DateTime();
                                    update(" personnel INNER JOIN personne ON id_personne_fk_personnel = id_personne ",[
                                        "categorie_personnel" => $categorie,
                                        "date_prise_fonction_personnel" => $date_prise_fonction,
                                        "notes_personnel" => $notes,
                                        "nom_personne" => $nom,
                                        "prenom_personne" => $prenom,
                                        "email_personne" => $email,
                                        "tel_personne" => $tel,
                                        "adresse_personne" => $adresse,
                                        "sexe_personne" => $sexe,
                                        "date_naissance_personne" => $date_naissance,
                                        "photo_personne" => $photo,
                                        "date_last_modif_personne" => $now->format('Y-m-d H:i:s'),
                                        "user_last_modif_personne" => $_SESSION['nom']." ".$_SESSION['prenom']
                                    ], "id_personnel = ".$id);

                                    $new_list_departement = $_POST['departement'];

                                    $statement1 = $bdd->prepare("SELECT id_departement_fk_assoc_departement_and_personnel as id_departement FROM assoc_departement_and_personnel WHERE id_personnel_fk_assoc_departement_and_personnel = ?");
                                    $statement1->execute(array($id));
                                    $old_list_departement = $statement1->fetchAll();

                                    foreach($old_list_departement as $row){
                                        if(!in_array($row['id_departement'], $new_list_departement)){
                                            update(" assoc_departement_and_personnel ", [
                                                "del_assoc_departement_and_personnel" => "1",
                                                "date_del_assoc_departement_and_personnel" => $now->format('Y-m-d H:i:s'),
                                                "user_del_assoc_departement_and_personnel" => $_SESSION['nom']." ".$_SESSION['prenom']
                                            ], " id_personnel_fk_assoc_departement_and_personnel = ".$id." AND id_departement_fk_assoc_departement_and_personnel = ".$row['id_departement']);
                                        }
                                        else{
                                            update(" assoc_departement_and_personnel ", [
                                                "del_assoc_departement_and_personnel" => "0",
                                                "date_last_modif_assoc_departement_and_personnel" => $now->format('Y-m-d H:i:s'),
                                                "user_last_modif_assoc_departement_and_personnel" => $_SESSION['nom']." ".$_SESSION['prenom']
                                            ], " id_personnel_fk_assoc_departement_and_personnel = ".$id." AND id_departement_fk_assoc_departement_and_personnel = ".$row['id_departement']);
                                            unset($new_list_departement[array_search($row['id_departement'], $new_list_departement)]);
                                        }
                                    }

                                    foreach($new_list_departement as $id_departement){
                                        insert(" assoc_departement_and_personnel ",[
                                            "id_departement_fk_assoc_departement_and_personnel" => $id_departement,
                                            "id_personnel_fk_assoc_departement_and_personnel" => $id,
                                            "date_create_assoc_departement_and_personnel" => $now->format('Y-m-d H:i:s'),
                                            "user_create_assoc_departement_and_personnel" => $_SESSION['nom']." ".$_SESSION['prenom'],
                                            "date_last_modif_assoc_departement_and_personnel" => $now->format('Y-m-d H:i:s'),
                                            "user_last_modif_assoc_departement_and_personnel" => $_SESSION['nom']." ".$_SESSION['prenom']
                                        ]);
                                    }

                                    ?>
                                    <script>
                                        window.location.replace("personnels.php?success=Le personnel <?php echo $nom." ".$prenom; ?> a été modifié.");
                                    </script>
                                    <?php
                                }
                                else{
                                    ?>
                                    <script>swal("Échoué", "Veuillez renseigner tous les chmaps.", "error")</script>
                                    <?php
                                }
                            }
                            if(isset($_GET['id']) && !empty($_GET['id'])){
                                $statement = $bdd->prepare("SELECT * FROM personne INNER JOIN personnel ON id_personne = id_personne_fk_personnel WHERE id_personnel = ?");
                                $statement->execute(array($_GET['id']));
                                $old_value = $statement->fetch();
                                $_POST['id'] = $old_value['id_personnel'];
                                $_POST['nom'] = $old_value['nom_personne'];
                                $_POST['prenom'] = $old_value['prenom_personne'];
                                $_POST['email'] = $old_value['email_personne'];
                                $_POST['sexe'] = $old_value['sexe_personne'];
                                $_POST['categorie'] = $old_value['categorie_personnel'];
                                $_POST['adresse'] = $old_value['adresse_personne'];
                                $_POST['tel'] = $old_value['tel_personne'];
                                $_POST['date_naissance'] = $old_value['date_naissance_personne'];
                                $_POST['date_prise_fonction'] = $old_value['date_prise_fonction_personnel'];
                                $_POST['notes'] = $old_value['notes_personnel'];

                                $statement = $bdd->prepare("SELECT id_departement FROM departement
                                INNER JOIN assoc_departement_and_personnel ON id_departement_fk_assoc_departement_and_personnel = id_departement
                                WHERE del_assoc_departement_and_personnel = '0' AND id_personnel_fk_assoc_departement_and_personnel = ?");
                                $statement->execute(array($_GET['id']));
                                $sub_result = $statement->fetchAll();
                                $departements = [];
                                foreach($sub_result as $sub_row){
                                    $departements[] = $sub_row['id_departement'];
                                }
                                $_POST['departement'] = $departements;
                            }
                        ?>
                        <div class="row">
                            <div class="m-auto col-md-11">
                                    <div class="card">
                                        <div class="card-header"><h3>Formulaire de modification de personnel</h3></div>
                                        <div class="card-body">
                                            <form class="forms-sample" enctype="multipart/form-data" action="" method="post">
                                                <input hidden type="text" name="id" value="<?php if(isset($_POST['id'])){ echo($_POST['id']); } ?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Nom</label>
                                                            <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo($_POST['nom']); ?>" class="form-control" id="exampleInputName1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Prénom</label>
                                                            <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])) echo($_POST['prenom']); ?>" class="form-control" id="exampleInputName1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail3">Email</label>
                                                            <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo($_POST['email']); ?>" class="form-control" id="exampleInputEmail3">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">Sexe</label>
                                                            <select name="sexe" class="form-control" id="exampleSelectGender">
                                                                <option value="">---</option>
                                                                <option value="M" <?php if(isset($_POST['sexe'])){ if($_POST['sexe']=="M") echo("selected"); }else if(isset($old_value)){ if($old_value['sexe_personne']=="M") echo("selected"); } ?>>Masculin</option>
                                                                <option value="F" <?php if(isset($_POST['sexe'])){ if($_POST['sexe']=="F") echo("selected"); }else if(isset($old_value)){ if($old_value['sexe_personne']=="F") echo("selected"); } ?>>Féminin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Catégories</label>
                                                            <select name="categorie" class="form-control" id="exampleSelectGender">
                                                                <option value="">---</option>
                                                                <option value="Infimier" <?php if(isset($_POST['categorie']) && $_POST['categorie']=="Infimier"){ echo("selected"); } ?>>Infimier</option>
                                                                <option value="Aide-Soignant" <?php if(isset($_POST['categorie']) && $_POST['categorie']=="Aide-Soignant"){ echo("selected"); } ?>>Aide-Soignant</option>
                                                                <option value="Agents d\'entretien" <?php if(isset($_POST['categorie']) && $_POST['categorie']=="Agents d'entretien"){ echo("selected"); } ?>>Agents d'entretien</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="departement">Services</label>
                                                            <select class="form-control select2" name="departement[]" multiple="multiple" id="departement">
                                                                <?php
                                                                    if(isset($_POST['departement'])){
                                                                        echo charger_departement_by_many_id($_POST['departement']);
                                                                    }else{
                                                                        echo(charger_departement(null));
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Adresse</label>
                                                            <input type="text" name="adresse" value="<?php if(isset($_POST['adresse'])) echo($_POST['adresse']); ?>" class="form-control" id="exampleInputName1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Téléphone</label>
                                                            <input type="text" name="tel" value="<?php if(isset($_POST['tel'])) echo($_POST['tel']); ?>" class="form-control" id="exampleInputName1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Date de naissance</label>
                                                            <input type="date" name="date_naissance" value="<?php if(isset($_POST['date_naissance'])) echo($_POST['date_naissance']); ?>" class="form-control" id="exampleInputName1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Date de prise de fonction</label>
                                                            <input type="date" name="date_prise_fonction" value="<?php if(isset($_POST['date_prise_fonction'])) echo($_POST['date_prise_fonction']); ?>" class="form-control" id="exampleInputName1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Photo</label>
                                                            <input type="file" name="photo" class="file-upload-default">
                                                            <div class="input-group col-xs-12">
                                                                <input type="text" class="form-control file-upload-info" disabled>
                                                                <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-primary" type="button">Choisir</button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Notes</label>
                                                    <textarea class="form-control" name="notes" id="exampleTextarea1" rows="4"><?php if(isset($_POST['notes'])) echo($_POST['notes']); ?></textarea>
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include("../parts/footer.php") ?>
                </div>  
            </div>
        </div>
        
        <script src="../assets/modules/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="../plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="../plugins/screenfull/dist/screenfull.js"></script>
        <script src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="../plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/moment/moment.js"></script>
        <script src="../plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="../plugins/d3/dist/d3.min.js"></script>
        <script src="../plugins/c3/c3.min.js"></script>
        <script src="../scripts_js/js/form-components.js"></script>
        <script src="../js/tables.js"></script>
        <script src="../js/widgets.js"></script>
        <script src="../js/charts.js"></script>
        <script src="../dist/js/theme.min.js"></script>
        <script src="../assets/modules/select2/dist/js/select2.full.min.js"></script>
        <script src="../scripts_js/js/form-advanced.js"></script>

    </body>
</html>
