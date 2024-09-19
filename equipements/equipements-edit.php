<?php
    include("../control_if_user_is_connected.php");
    $menu_equipements = "active";
    $menu_ajout_equipements = "active";
?>
<!doctype html>
<html class="no-js" lang="en">
<?php include("../parts/head.php"); ?>

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
                                            <h5>Modification de équipement</h5>
                                            <span>En remplissant ce formulaire, vous pouvez modifier un équipement existant</span>
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
                                                <a href="#">Équipement</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Modifier équipement</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['submit'])){
                                if(!empty($_POST['nom']) && !empty($_POST['id']) && !empty($_POST['departement']) && ((isset($_POST['equipement_emmagasine']) && !empty($_POST['magasin'])) || !isset($_POST['equipement_emmagasine']))){
                                    $id = htmlspecialchars($_POST['id']);
                                    $statement = $bdd->prepare("SELECT * FROM equipement WHERE del_equipement = '0' AND id_equipement=?");
                                    $statement->execute(array($id));
                                    $value = $statement->fetch();
                                    $photo = $value['photo_equipement'];
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
                                    else{
                                        
                                    }
                                    $equipement_emmagasine = "Non";
                                    $magasin = "";
                                    if(isset($_POST['equipement_emmagasine']) && !empty($_POST['magasin'])){
                                        $equipement_emmagasine = "Oui";
                                        $magasin = htmlspecialchars($_POST['magasin']);
                                    }
                                    $nom = htmlspecialchars($_POST['nom']);
                                    $desc = htmlspecialchars($_POST['desc']);
                                    $notes = htmlspecialchars($_POST['notes']);
                                    $departement = htmlspecialchars($_POST['departement']);
                                    $now = new DateTime();
                                    update("equipement",[
                                        "nom_equipement" => $nom,
                                        "desc_equipement" => $desc,
                                        "photo_equipement" => $photo,
                                        "notes_equipement" => $notes,
                                        "stored_equipement" => $equipement_emmagasine,
                                        "id_magasin_fk_equipement" => $magasin,
                                        "date_last_modif_equipement" => $now->format('Y-m-d H:i:s'),
                                        "user_last_modif_equipement" => $_SESSION['nom']." ".$_SESSION['prenom'],
                                        "id_departement_fk_equipement" => $departement
                                    ], " id_equipement = ".$id);
                                    ?>
                                    <script>
                                        window.location.replace("equipements.php?success=L'équipement <?php echo $nom; ?> a été modifié.");
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
                                $statement = $bdd->prepare("SELECT * FROM equipement WHERE del_equipement = '0' AND id_equipement=?");
                                $statement->execute(array($_GET['id']));
                                $old_value = $statement->fetch();
                                $_POST['id'] = $old_value['id_equipement'];
                                $_POST['nom'] = $old_value['nom_equipement'];
                                $_POST['desc'] = $old_value['desc_equipement'];
                                $_POST['notes'] = $old_value['notes_equipement'];
                                if($old_value['stored_equipement']=="Oui"){
                                    $_POST['equipement_emmagasine'] = $old_value['stored_equipement'];
                                }
                                $_POST['magasin'] = $old_value['id_magasin_fk_equipement'];
                                $_POST['departement'] = $old_value['id_departement_fk_equipement'];
                            }
                        ?>
                        <div class="row">
                            <div class="m-auto col-md-11">
                                    <div class="card">
                                        <div class="card-header"><h3>Formulaire de modification de équipement</h3></div>
                                        <div class="card-body">
                                            <form class="forms-sample" enctype="multipart/form-data" action="" method="post">
                                            <input type="text" name="id" value="<?php if(isset($_POST['id'])){ echo($_POST['id']); } ?>" hidden>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Nom</label>
                                                            <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo($_POST['nom']); ?>" class="form-control" id="exampleInputName1">
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
                                                <div class="row">
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
                                                    <div class="col-md-6">    
                                                        <div class="form-group">
                                                            <label for="desc">Description</label>
                                                            <input class="form-control" name="desc" id="desc" value="<?php if(isset($_POST['desc'])) echo($_POST['desc']); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="checkbox" name="equipement_emmagasine" id="equipement_emmagasine" <?php if(isset($_POST['equipement_emmagasine'])){ echo("checked"); } ?>>
                                                    <label for="equipement_emmagasine">Équipement emmagasiné ?</label>
                                                </div>
                                                <div class="form-group" id="details_magasin">
                                                    <label for="magasin">Magasin</label>
                                                    <select name="magasin" class="form-control" id="magasin">
                                                        <option value="">---</option>
                                                        <?php 
                                                            if(isset($_POST['magasin'])){ 
                                                                echo(charger_magasin($_POST['magasin']));
                                                            }
                                                            else{
                                                                echo(charger_magasin(null));
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="notes">Notes</label>
                                                    <textarea class="form-control" name="notes" id="notes" rows="4"><?php if(isset($_POST['notes'])) echo($_POST['notes']); ?></textarea>
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
                if(!isset($_POST['equipement_emmagasine'])){
                    ?>
                    $("#details_magasin").hide();
                    <?php
                }
            ?>
            $("#equipement_emmagasine").click(function(){
                $("#details_magasin").slideToggle();
            });
        </script>

    </body>
</html>
