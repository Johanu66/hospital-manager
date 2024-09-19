<?php
    include("../control_if_user_is_connected.php");
    $menu_planning_docteurs = "active";
    $menu_ajout_planning_docteurs = "active";
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
                                            <h5>Ajout de nouveau planning</h5>
                                            <span>En remplissant ce formulaire, vous pouvez enregistrer un nouveau planning</span>
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
                                                <a href="#">Planning des docteurs</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Ajouter un planning</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['submit'])){
                                if(!empty($_POST['docteur']) && !empty($_POST['planning'])){
                                    $docteur = htmlspecialchars($_POST['docteur']);
                                    //Vérifier que le docteur n'avait pas de planning
                                    $statement = $bdd->prepare("SELECT * FROM planning WHERE del_planning='0' AND id_docteur_fk_planning = ?");
                                    $statement->execute(array($docteur));
                                    if($statement->rowCount() == 0){
                                        $planning = htmlspecialchars($_POST['planning']);
                                        $now = new DateTime();
                                        insert("planning",[
                                            "planning" => $planning,
                                            "date_create_planning" => $now->format('Y-m-d H:i:s'),
                                            "user_create_planning" => $_SESSION['nom']." ".$_SESSION['prenom'],
                                            "date_last_modif_planning" => $now->format('Y-m-d H:i:s'),
                                            "user_last_modif_planning" => $_SESSION['nom']." ".$_SESSION['prenom'],
                                            "id_docteur_fk_planning" => $docteur
                                        ]);
                                        ?>
                                        <script>
                                            window.location.replace("planning-des-docteurs.php?success=Le planning a été enregistré.");
                                        </script>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <script>swal("Échoué", "Ce docteur dispose déjà d'un planning.", "error")</script>
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
                                        <div class="card-header"><h3>Formulaire d'ajout du planning des docteurs</h3></div>
                                        <div class="card-body">
                                            <form class="forms-sample" enctype="multipart/form-data" action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Docteur</label>
                                                            <select type="text" name="docteur" class="form-control" id="docteur">
                                                                <option value="">---</option>
                                                                <?php
                                                                    if(isset($_POST['docteur'])){
                                                                        echo(charger_docteur($_POST['docteur']));
                                                                    }else{
                                                                        echo(charger_docteur(null));
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Service</label>
                                                            <input type="text" readonly name="departement" value="<?php if(isset($_POST['departement'])) echo($_POST['departement']); ?>" class="form-control" id="departement">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Planning ( Ex: Lundi-Mardi, 10h-15h )</label>
                                                            <input type="text" name="planning" value="<?php if(isset($_POST['planning'])) echo($_POST['planning']); ?>" class="form-control" id="exampleInputName1">
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


        <script>
            $(document).on("change", "#docteur", function(){
                var id_docteur = $(this).val();
                $.ajax({
                    url:"planning-des-docteurs-fetch-departement-by-docteur.php",
                    method:"POST",
                    data:{id_docteur:id_docteur},
                    dataType:"JSON",
                    success:function(data){
                        $("#departement").val(data);
                    }
                });
            });
        </script>
    </body>
</html>