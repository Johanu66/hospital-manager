<?php
    include("../control_if_user_is_connected.php");
    $menu_recettes = "active";
    $menu_ajout_recettes = "active";
?>
<!doctype html>
<html class="no-js" lang="en">
<?php include("../parts/head.php"); ?>

    <body>
        <div class="wrapper">
            <?php include("../parts/header.php") ?>
            <div class="page-wrap">
                <?php include("../parts/sidebar.php") ?>

                <?php include("../if_test_env.php") ?>

                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-inbox bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Ajout de nouvelle recette</h5>
                                            <span>En remplissant ce formulaire, vous pouvez enregistrer une nouvelle recette</span>
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
                                                <a href="#">Recette</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Ajouter recette</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['submit']) && !$_TEST_ENV){
                                if(!empty($_POST['date']) && !empty($_POST['departement']) && !empty($_POST['prestation']) && !empty($_POST['montant'])){
                                    $patient_assure = "Non";
                                    $montant_paye_par_assure_correct = true;
                                    $montant = htmlspecialchars($_POST['montant']);
                                    if(isset($_POST['patient_assure'])){
                                        $patient_assure = "Oui";
                                        $assureur = htmlspecialchars($_POST['assureur']);
                                        $montant_paye_par_assureur = htmlspecialchars($_POST['montant_paye_par_assureur']);
                                        if($montant_paye_par_assureur >= $montant){
                                            $montant_paye_par_assure_correct = false;
                                        }
                                    }
                                    if($montant_paye_par_assure_correct){
                                        if((!isset($_POST['nouveau_patient']) && !empty($_POST['patient'])) | (isset($_POST['nouveau_patient']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['sexe']) && !empty($_POST['adresse']) && !empty($_POST['tel']) && !empty($_POST['date_naissance']))){
                                            if(!isset($_POST['nouveau_patient']) && !empty($_POST['patient'])){
                                                $id_patient = $_POST['patient'];
                                            }
                                            else{
                                                $photo = "default.jpg";
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
                                                $adresse = htmlspecialchars($_POST['adresse']);
                                                $tel = htmlspecialchars($_POST['tel']);
                                                $date_naissance = htmlspecialchars($_POST['date_naissance']);
                                                $notes = htmlspecialchars($_POST['notes']);
                                                $now = new DateTime();
                                                insert("personne",[
                                                    "nom_personne" => $nom,
                                                    "prenom_personne" => $prenom,
                                                    "email_personne" => $email,
                                                    "tel_personne" => $tel,
                                                    "adresse_personne" => $adresse,
                                                    "sexe_personne" => $sexe,
                                                    "date_naissance_personne" => $date_naissance,
                                                    "photo_personne" => $photo,
                                                    "date_create_personne" => $now->format('Y-m-d H:i:s'),
                                                    "user_create_personne" => $_SESSION['nom']." ".$_SESSION['prenom'],
                                                    "date_last_modif_personne" => $now->format('Y-m-d H:i:s'),
                                                    "user_last_modif_personne" => $_SESSION['nom']." ".$_SESSION['prenom']
                                                ]);

                                                $statement = $bdd->query("SELECT MAX(id_personne) as last_id_personne FROM personne");
                                                $row = $statement->fetch();
                                                insert("patient",[
                                                    "notes_patient" => $notes,
                                                    "id_personne_fk_patient" => $row['last_id_personne'],
                                                ]);

                                                $statement = $bdd->query("SELECT MAX(id_patient) as last_id_patient FROM patient");
                                                $row = $statement->fetch();
                                                $id_patient = $row['last_id_patient'];
                                            }
                                            $date = htmlspecialchars($_POST['date']);
                                            $departement = htmlspecialchars($_POST['departement']);
                                            $prestation = htmlspecialchars($_POST['prestation']);
                                            $notes_recette = htmlspecialchars($_POST['notes_recette']);
                                            $now = new DateTime();
                                            insert("recette",[
                                                "date_recette" => $date,
                                                "patient_assure_recette" => $patient_assure,
                                                "assureur_recette" => $assureur,
                                                "montant_paye_par_assureur_recette" => $montant_paye_par_assureur,
                                                "notes_recette" => $notes_recette,
                                                "date_create_recette" => $now->format('Y-m-d H:i:s'),
                                                "user_create_recette" => $_SESSION['nom']." ".$_SESSION['prenom'],
                                                "date_last_modif_recette" => $now->format('Y-m-d H:i:s'),
                                                "user_last_modif_recette" => $_SESSION['nom']." ".$_SESSION['prenom'],
                                                "id_prestation_fk_recette" => $prestation,
                                                "id_patient_fk_recette" => $id_patient
                                            ]);
                                            ?>
                                            <script>
                                                window.location.replace("recettes.php?success=La recette a été enregistrée.");
                                            </script>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <script>swal("Échoué", "Veuillez renseigner tous les chmaps.", "error")</script>
                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                            <script>swal("Échoué", "Le montant payé par l'assuré ne peut pas être supérieur au montant de la prestation.", "error")</script>
                                        <?php
                                    }
                                }
                                else{
                                    ?>
                                        <script>swal("Échoué", "Veuillez renseigner tous les chmaps.", "error")</script>
                                    <?php
                                }
                            }
                        ?>
                        <div class="row">
                            <div class="m-auto col-md-11">
                                    <div class="card">
                                        <div class="card-header"><h3>Formulaire d'ajout de recette</h3></div>
                                        <div class="card-body">
                                            <form class="forms-sample" enctype="multipart/form-data" action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Date</label>
                                                            <input type="date" name="date" value="<?php if(isset($_POST['date'])) echo($_POST['date']); ?>" class="form-control" id="exampleInputName1" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="departement">Service</label>
                                                            <select name="departement" class="form-control" id="departement"  required="required">
                                                                <option value="">---</option>
                                                                <?php 
                                                                    if(isset($_POST['departement'])){ 
                                                                        echo(charger_departement($_POST['departement']));
                                                                    }
                                                                    else{
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
                                                            <label for="prestation">Prestation</label>
                                                            <select name="prestation" class="form-control" id="prestation" required="required">
                                                                <option value="">---</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="montant">Montant</label>
                                                            <input type="text" name="montant" readonly value="<?php if(isset($_POST['montant'])) echo($_POST['montant']); ?>" class="form-control" id="montant" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="select_patient">
                                                    <label for="patient">Patient</label>
                                                    <select name="patient" class="form-control" id="patient">
                                                        <option value="">---</option>
                                                        <?php 
                                                            if(isset($_POST['patient'])){ 
                                                                echo(charger_patient($_POST['patient']));
                                                            }
                                                            else{
                                                                echo(charger_patient(null));
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div>
                                                    <input type="checkbox" name="nouveau_patient" id="nouveau_patient" <?php if(isset($_POST['nouveau_patient'])){ echo("checked"); } ?>>
                                                    <label for="nouveau_patient">Nouveau patient</label>
                                                </div>
                                                <div id="form_nouveau_patient">
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
                                                </div>
                                                <div>
                                                    <input type="checkbox" name="patient_assure" id="patient_assure" <?php if(isset($_POST['patient_assure'])){ echo("checked"); } ?>>
                                                    <label for="patient_assure">Patient assuré ?</label>
                                                </div>
                                                <div class="row" id="details_assureur">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="assureur">Assureur</label>
                                                            <input type="text" name="assureur" value="<?php if(isset($_POST['assureur'])) echo($_POST['assureur']); ?>" class="form-control" id="montant">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="montant_paye_par_assureur">Montant payé par l'assuré</label>
                                                            <input type="text" name="montant_paye_par_assureur" value="<?php if(isset($_POST['montant_paye_par_assureur'])) echo($_POST['montant_paye_par_assureur']); ?>" class="form-control" id="montant_paye_par_assureur">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="notes">Notes</label>
                                                    <textarea class="form-control" name="notes_recette" id="notes" rows="4"><?php if(isset($_POST['notes_recette'])) echo($_POST['notes_recette']); ?></textarea>
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

        <script>
            <?php
                if(isset($_POST['nouveau_patient'])){
                    ?>
                    $("#select_patient").hide();
                    <?php
                }
                else{
                    ?>
                    $("#form_nouveau_patient").hide();
                    <?php
                }
            ?>
            $("#nouveau_patient").click(function(){
                $("#form_nouveau_patient").slideToggle();
                $("#select_patient").slideToggle();
                /*if ($(this).prop("checked") == true) {
                    $("#form_nouveau_patient").slideToggle();
                    $("#select_patient").slideToggle();
                }else{
                    $("#form_nouveau_patient").slideToggle();
                    $("#select_patient").slideToggle();
                }*/
            });

            <?php
                if(!isset($_POST['patient_assure'])){
                    ?>
                    $("#details_assureur").hide();
                    <?php
                }
            ?>
            $("#patient_assure").click(function(){
                $("#details_assureur").slideToggle();
                /*if ($(this).prop("checked") == true) {
                    $("#details_assureur").slideToggle();
                }else{
                    $("#details_assureur").slideToggle();
                }*/
            });

            //Chargement des prestation du departement ou service choisi
            <?php
                if(isset($_POST['departement'])){
                    ?>
                    var id_departement_selected = $("#departement").val();
                    $.ajax({
                        url:"recettes-fetch-list-prestation-by-departement.php",
                        method:"POST",
                        data:{id_departement_selected:id_departement_selected<?php if(isset($_POST['prestation'])) echo(",id_prestation:".$_POST['prestation']); ?>},
                        dataType:"JSON",
                        success:function(data){
                            $("#prestation").html(data);
                        }
                    });
                    <?php
                }
            ?>
            $(document).on("change", "#departement", function(){
                var id_departement_selected = $(this).val();
                $("#montant").val("");
                $.ajax({
                    url:"recettes-fetch-list-prestation-by-departement.php",
                    method:"POST",
                    data:{id_departement_selected:id_departement_selected},
                    dataType:"JSON",
                    success:function(data){
                        $("#prestation").html(data);
                    }
                });
            });


            $(document).on("change", "#prestation", function(){
                var id_prestation = $(this).val();
                $.ajax({
                    url:"recettes-fetch-montant-by-prestation.php",
                    method:"POST",
                    data:{id_prestation:id_prestation},
                    dataType:"JSON",
                    success:function(data){
                        $("#montant").val(data);
                    }
                });
            });
        </script>

    </body>
</html>
