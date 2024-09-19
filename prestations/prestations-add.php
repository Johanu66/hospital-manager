<?php
    include("../control_if_user_is_connected.php");
    $menu_prestations = "active";
    $menu_ajout_prestations = "active";
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
                                            <h5>Ajout de nouvelle prestation</h5>
                                            <span>En remplissant ce formulaire, vous pouvez enregistrer une nouvelle prestation</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="../index.html"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Prestation</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Ajouter prestation</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php
            if(isset($_POST['submit'])){
                if(!empty($_POST['nom']) && !empty($_POST['departement']) && !empty($_POST['montant'])){
                    $nom = htmlspecialchars($_POST['nom']);
                    $departement = htmlspecialchars($_POST['departement']);
                    $montant = htmlspecialchars($_POST['montant']);
                    $notes = htmlspecialchars($_POST['notes']);
                    $now = new DateTime();
                    insert("prestation",[
                        "nom_prestation" => $nom,
                        "montant_prestation" => $montant,
                        "notes_prestation" => $notes,
                        "date_create_prestation" => $now->format('Y-m-d H:i:s'),
                        "user_create_prestation" => $_SESSION['nom']." ".$_SESSION['prenom'],
                        "date_last_modif_prestation" => $now->format('Y-m-d H:i:s'),
                        "user_last_modif_prestation" => $_SESSION['nom']." ".$_SESSION['prenom'],
                        "id_departement_fk_prestation" => $departement
                    ]);
                    ?>
                    <script>
                        window.location.replace("prestations.php?success=La prestation <?php echo $nom; ?> a été enregistrée.");
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
                                        <div class="card-header"><h3>Formulaire d'ajout de prestation</h3></div>
                                        <div class="card-body">
                                            <form class="forms-sample" enctype="multipart/form-data" action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Nom</label>
                                                            <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo($_POST['nom']); ?>" class="form-control" id="exampleInputName1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Service</label>
                                                            <select name="departement" class="form-control" id="exampleSelectGender">
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
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Montant</label>
                                                            <input type="text" name="montant" value="<?php if(isset($_POST['montant'])) echo($_POST['montant']); ?>" class="form-control" id="exampleInputName1">
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


    </body>
</html>
