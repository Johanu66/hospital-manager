<?php
    include("../control_if_user_is_connected.php");
    $menu_departements = "active";
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
                                            <h5>Modification d'un service</h5>
                                            <span>En remplissant ce formulaire, vous pouvez modifier un service existant.</span>
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
                                                <a href="#">Services</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Modifier un service</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['submit']) && !$_TEST_ENV){
                                if(!empty($_POST['nom']) && !empty($_POST['id_departement']) && !empty($_POST['batiment'])){
                                    $id_departement = htmlspecialchars($_POST['id_departement']);
                                    $nom = htmlspecialchars($_POST['nom']);
                                    $desc = htmlspecialchars($_POST['desc']);
                                    $batiment = htmlspecialchars($_POST['batiment']);
                                    $now = new DateTime();

                                    //Vérifier si le service existait
                                    $statement = $bdd->prepare("SELECT nom_departement FROM departement WHERE id_departement != ?");
                                    $statement->execute(array($id_departement));
                                    $find = false;
                                    while($row = $statement->fetch()){
                                        if($row["nom_departement"] == $nom){
                                            $find = true;
                                            break;
                                        }
                                    }
                                    if($find){
                                        ?>
                                            <script>swal("Échoué", "Cette spécialité existe déjà.", "error")</script>
                                        <?php
                                    }else{
                                        update("departement",[
                                            "nom_departement" => $nom,
                                            "desc_departement" => $desc,
                                            "date_last_modif_departement" => $now->format('Y-m-d H:i:s'),
                                            "user_last_modif_departement" => $_SESSION['nom']." ".$_SESSION['prenom'],
                                            "id_batiment_fk_departement" => $batiment
                                        ], " id_departement = '".$id_departement."'");
                                        //header("Location:departements.php?success=La service ".$nom." a été enregistré.");
                                        ?>
                                        <script>
                                            window.location.replace("departements.php?success=Le service <?php echo $nom; ?> a été modifié.");
                                        </script>
                                        <?php
                                    }
                                }
                                else{
                                    ?>
                                    <script>swal("Échoué", "Veuillez renseigner tous les chmaps.", "error")</script>
                                    <?php
                                }
                            }

                            if(isset($_GET['id']) && !empty($_GET['id'])){
                                $statement = $bdd->prepare("SELECT * FROM departement WHERE del_departement='0' AND id_departement = ?");
                                $statement->execute(array($_GET['id']));
                                $old_value = $statement->fetch();
                                $_POST['id_departement'] =$old_value['id_departement'];
                                $_POST['nom'] = $old_value['nom_departement'];
                                $_POST['desc'] = $old_value['desc_departement'];
                                $_POST['batiment'] = $old_value['id_batiment_fk_departement'];
                            }

                        ?>
                        <div class="row">
                            <div class="m-auto col-md-11">
                                    <div class="card">
                                        <div class="card-header"><h3>Formulaire de modification de service</h3></div>
                                        <div class="card-body">
                                            <form class="forms-sample" enctype="multipart/form-data" action="" method="post">
                                            <input type="text" name="id_departement" value="<?php if(isset($_POST['id_departement'])){ echo($_POST['id_departement']); }  ?>" style="display:none;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nom">Nom</label>
                                                            <input type="text" name="nom" value="<?php if(isset($_POST['nom'])){ echo($_POST['nom']); }  ?>" class="form-control" id="nom">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="batiment">Bâtiment du service</label>
                                                            <select name="batiment" class="form-control" id="batiment">
                                                                <option value="">---</option>
                                                                <?php 
                                                                    if(isset($_POST['batiment'])){ 
                                                                        echo(charger_batiment($_POST['batiment']));
                                                                    }
                                                                    else{
                                                                        echo(charger_batiment(null));
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="desc">Description</label>
                                                            <input type="text" name="desc" value="<?php if(isset($_POST['desc'])){ echo($_POST['desc']); }  ?>" class="form-control" id="desc">
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