<?php
    include("../control_if_user_is_connected.php");
    $menu_depenses = "active";
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
                                            <h5>Modification dépense</h5>
                                            <span>En remplissant ce formulaire, vous pouvez modifier une dépense</span>
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
                                                <a href="#">Dépense</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Modifier une dépense</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['submit'])){
                                if(!empty($_POST['id']) && !empty($_POST['date']) && !empty($_POST['nom']) && !empty($_POST['departement']) && !empty($_POST['montant'])){
                                    $id = htmlspecialchars($_POST['id']);
                                    $date = htmlspecialchars($_POST['date']);
                                    $nom = htmlspecialchars($_POST['nom']);
                                    $departement = htmlspecialchars($_POST['departement']);
                                    $montant = htmlspecialchars($_POST['montant']);
                                    $now = new DateTime();

                                    update("depense",[
                                        "date_depense" => $date,
                                        "nom_depense" => $nom,
                                        "montant_depense" => $montant,
                                        "date_last_modif_depense" => $now->format('Y-m-d H:i:s'),
                                        "user_last_modif_depense" => $_SESSION['nom']." ".$_SESSION['prenom'],
                                        "id_departement_fk_depense" => $departement
                                    ], " id_depense = ".$id);
                                    //header("Location:depenses.php?success=La dépense ".$nom." a été enregistré.");
                                    ?>
                                    <script>
                                        window.location.replace("depenses.php?success=La dépense <?php echo $nom; ?> a été modifiée.");
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
                                $statement = $bdd->prepare("SELECT * FROM depense INNER JOIN departement ON id_departement_fk_depense=id_departement WHERE del_depense='0' AND id_depense = ?");
                                $statement->execute(array($_GET['id']));
                                $old_value = $statement->fetch();
                                $_POST['id'] = $old_value['id_depense'];
                                $_POST['date'] = $old_value['date_depense'];
                                $_POST['departement'] = $old_value['id_departement'];
                                $_POST['nom'] = $old_value['nom_depense'];
                                $_POST['montant'] = $old_value['montant_depense'];
                                $_POST['notes'] = $old_value['notes_depense'];
                            }
                        ?>
                        <div class="row">
                            <div class="m-auto col-md-11">
                                    <div class="card">
                                        <div class="card-header"><h3>Formulaire d'ajout de dépense</h3></div>
                                        <div class="card-body">
                                            <form class="forms-sample" enctype="multipart/form-data" action="" method="post">
                                                <input hidden type="text" name="id" value="<?php if(isset($_POST['id'])){ echo($_POST['id']); } ?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date">Date</label>
                                                            <input type="date" name="date" value="<?php if(isset($_POST['date'])) echo($_POST['date']); ?>" class="form-control" id="date" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nom">Nature / Nom</label>
                                                            <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo($_POST['nom']); ?>" class="form-control" id="nom" required="required">
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
                                                            <label for="montant">Montant</label>
                                                            <input type="text" name="montant" value="<?php if(isset($_POST['montant'])) echo($_POST['montant']); ?>" class="form-control" id="montant" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="notes">Notes</label>
                                                            <textarea class="form-control" name="notes" id="notes" rows="4"><?php if(isset($_POST['notes'])) echo($_POST['notes']); ?></textarea>
                                                        </div>
                                                    </div>
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