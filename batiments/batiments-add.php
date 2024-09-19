<?php
    include("../control_if_user_is_connected.php");
    $menu_batiments = "active";
    $menu_ajout_batiments = "active";
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
                                            <h5>Ajout de bâtiment</h5>
                                            <span>En remplissant ce formulaire, vous pouvez ajouter un nouveau bâtiment</span>
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
                                                <a href="#">Bâtiment</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Ajouter bâtiment</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php
            if(isset($_POST['submit'])){
                if(!empty($_POST['nom'])){
                    $photo = "default_shop.png";
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
                    $nom = htmlspecialchars($_POST['nom']);
                    $desc = htmlspecialchars($_POST['desc']);
                    $now = new DateTime();
                    insert("batiment",[
                        "nom_batiment" => $nom,
                        "desc_batiment" => $desc,
                        "photo_batiment" => $photo,
                        "date_create_batiment" => $now->format('Y-m-d H:i:s'),
                        "user_create_batiment" => $_SESSION['nom']." ".$_SESSION['prenom'],
                        "date_last_modif_batiment" => $now->format('Y-m-d H:i:s'),
                        "user_last_modif_batiment" => $_SESSION['nom']." ".$_SESSION['prenom']
                    ]);
                    //header("Location:batiments.php");
                    ?>
                    <script>
                        window.location.replace("batiments.php?success=Le batiment <?php echo $nom; ?> a été enregistré.");
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>swal("Échoué", "Veuillez renseigner tous les chmaps.", "error")</script>
                    <?php
                }
            }
        ?>
                        <h1><?php  ?></h1>
                        <div class="row">
                            <div class="m-auto col-md-11">
                                    <div class="card">
                                        <div class="card-header"><h3>Formulaire d'ajout de bâtiment</h3></div>
                                        <div class="card-body">
                                            <form class="forms-sample" enctype="multipart/form-data" action="" method="post">
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
                                                <div class="form-group">
                                                    <label for="desc">Description</label>
                                                    <textarea class="form-control" name="desc" id="desc" rows="4"><?php if(isset($_POST['desc'])) echo($_POST['desc']); ?></textarea>
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


    </body>
</html>
