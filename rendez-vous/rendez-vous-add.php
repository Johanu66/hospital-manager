<?php
    include("../control_if_user_is_connected.php");
    $menu_rendez_vous = "active";
    $menu_ajout_rendez_vous = "active";
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
                                            <h5>Ajout de nouveau rendez-vous</h5>
                                            <span>En remplissant ce formulaire, vous pouvez enregistrer un nouveau rendez-vous</span>
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
                                                <a href="#">Rendez-vous</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Ajouter rendez-vous</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['submit'])){
                                if(!empty($_POST['patient']) && !empty($_POST['specialite']) && !empty($_POST['date_rendez_vous'])){
                                    if(!isset($_POST['paiement']) | (isset($_POST['paiement']) && !empty($_POST['montant_paye']))){
                                        $paiement = "";
                                        if(isset($_POST['paiement'])){
                                            $paiement = "Oui";
                                        }
                                        else{
                                            $paiement = "Non";
                                        }
                                        $patient = htmlspecialchars($_POST['patient']);
                                        $specialite = htmlspecialchars($_POST['specialite']);
                                        $date_rendez_vous = htmlspecialchars($_POST['date_rendez_vous']);
                                        $date_debut_symptomes = htmlspecialchars($_POST['date_debut_symptomes']);
                                        $notes = htmlspecialchars($_POST['notes']);
                                        $symptomes = htmlspecialchars($_POST['symptomes']);
                                        $montant_paye = htmlspecialchars($_POST['montant_paye']);
                                        $now = new DateTime();
                                        insert("rendez_vous",[
                                            "date_rendez_vous" => $date_rendez_vous,
                                            "symptomes_rendez_vous" => $symptomes,
                                            "date_debut_symptome_rendez_vous" => $date_debut_symptomes,
                                            "notes_rendez_vous" => $notes,
                                            "Paiement_rendez_vous" => $paiement,
                                            "montant_paye_rendez_vous" => $montant_paye,
                                            "date_create_rendez_vous" => $now->format('Y-m-d H:i:s'),
                                            "user_create_rendez_vous" => $_SESSION['nom']." ".$_SESSION['prenom'],
                                            "date_last_modif_rendez_vous" => $now->format('Y-m-d H:i:s'),
                                            "user_last_modif_rendez_vous" => $_SESSION['nom']." ".$_SESSION['prenom'],
                                            "id_patient_fk_rendez_vous" => $patient,
                                            "id_specialite_fk_rendez_vous" => $specialite
                                        ]);
                                        ?>
                                        <script>
                                            window.location.replace("rendez-vous.php?success=Le rendez vous a été enregistré.");
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
                                    <script>swal("Échoué", "Veuillez renseigner tous les chmaps.", "error")</script>
                                    <?php
                                }
                            }
                        ?>
                        <div class="row">
                            <div class="m-auto col-md-11">
                                    <div class="card">
                                        <div class="card-header"><h3>Formulaire d'ajout de rendez-vous</h3></div>
                                        <div class="card-body">
                                            <form class="forms-sample" enctype="multipart/form-data" action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
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
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Spécialités</label>
                                                            <select name="specialite" class="form-control" id="exampleSelectGender">
                                                                <option value="">---</option>
                                                                <?php 
                                                                    if(isset($_POST['specialite'])){ 
                                                                        echo(charger_specialite($_POST['specialite']));
                                                                    }
                                                                    else{
                                                                        echo(charger_specialite(null));
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date_rendez_vous">Date du rendez-vous</label>
                                                            <input type="datetime-local" name="date_rendez_vous" value="<?php if(isset($_POST['date_rendez_vous'])) echo($_POST['date_rendez_vous']); ?>" class="form-control" id="date_rendez_vous">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date_debut_symptomes">Date de début de symptômes</label>
                                                            <input type="date" name="date_debut_symptomes" value="<?php if(isset($_POST['date_debut_symptomes'])) echo($_POST['date_debut_symptomes']); ?>" class="form-control" id="date_debut_symptomes">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleTextarea1">Notes</label>
                                                            <textarea class="form-control" name="notes" id="notes" rows="4"><?php if(isset($_POST['notes'])) echo($_POST['notes']); ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="symptomes">Symptômes</label>
                                                            <textarea class="form-control" name="symptomes" id="symptomes" rows="4"><?php if(isset($_POST['notes'])) echo($_POST['notes']); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="checkbox" name="paiement" id="paiement" <?php if(isset($_POST['paiement'])){ echo("checked"); } ?>><label for="paiement">Paiement</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6" id="montant_paye_div">
                                                        <div class="form-group">
                                                            <label for="montant_paye">Montant payé</label>
                                                            <input type="dtextate" name="montant_paye" value="<?php if(isset($_POST['montant_paye'])) echo($_POST['montant_paye']); ?>" class="form-control" id="montant_paye">
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


        <script type="text/javascript">

            /* Affichage de la liste */ //changer
            var docteursDataTable = $('#data_table').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url:"docteurs_fetch.php", //changer
                    dataType:"json",
                    type:"POST"
                },
                "columnDefs":[
                    {
                        "targets":[], // changer l'index des colonnes qui ne seront pas triées
                        "orderable":false,
                    },
                ],
                "bSort" : false,
                "pageLength": 10
            });

            <?php
                if(!isset($_POST['paiement'])){
                    ?>
                    $("#montant_paye_div").hide();
                    <?php
                }
            ?>
            $("#paiement").click(function(){
                $("#montant_paye_div").slideToggle();
            });

        </script>

    </body>
</html>
