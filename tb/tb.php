<?php
    include("../control_if_user_is_connected.php");
    $menu_tb = "active";
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
        <link rel="stylesheet" href="../plugins/chartist/dist/chartist.min.css">
        <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <?php include("../parts/header.php") ?>
            <div class="page-wrap">
                <?php include("../parts/sidebar.php") ?>

                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget bg-primary">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Prestations</h6>
                                                        <h2><?php echo nombre(" prestation ", " del_prestation='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-menu"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="lineChart_area_prestation" class="chart-shadow st-cir-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget border">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Recettes</h6>
                                                        <h2><?php echo nombre(" recette ", " del_recette='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-aperture"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="lineChart_area_recette" class="chart-shadow st-cir-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Docteurs</h6>
                                                        <h2><?php echo nombre(" docteur INNER JOIN personne ON id_personne=id_personne_fk_docteur ", " del_personne='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-layers"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="lineChart_area_docteur" class="chart-shadow st-cir-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget bg-success">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Patients</h6>
                                                        <h2><?php echo nombre(" patient INNER JOIN personne ON id_personne=id_personne_fk_patient ", " del_personne='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-box"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="placeholder_patient" class="demo-placeholder" style="height:300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget border">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Rendez-vous</h6>
                                                        <h2><?php echo nombre(" rendez_vous ", " del_rendez_vous='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-gitlab"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="placeholder_rendez_vous" class="demo-placeholder" style="height:300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Spécialités</h6>
                                                        <h2><?php echo nombre(" specialite ", " del_specialite='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-command"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="placeholder_specialite" class="demo-placeholder" style="height:300px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget bg-warning">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Services</h6>
                                                        <h2><?php echo nombre(" departement ", " del_departement='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-edit"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block text-center">
                                        <div id="line_chart_departement" class="chart-shadow" style="height:300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget border">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Dépenses</h6>
                                                        <h2><?php echo nombre(" depense ", " del_depense='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block text-center">
                                        <div id="line_chart_depense" class="chart-shadow" style="height:300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Magasins</h6>
                                                        <h2><?php echo nombre(" magasin ", " del_magasin='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-grid"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block text-center">
                                        <div id="line_chart_magasin" class="chart-shadow" style="height:300px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget bg-danger">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Bâtiments</h6>
                                                        <h2><?php echo nombre(" batiment ", " del_batiment='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-home"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="lineChart_batiment" class="chart-shadow st-cir-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget border">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Équipements</h6>
                                                        <h2><?php echo nombre(" equipement ", " del_equipement='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-credit-card"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="lineChart_equipement" class="chart-shadow st-cir-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget">
                                            <div class="widget-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="state">
                                                        <h6>Personnels</h6>
                                                        <h2><?php echo nombre(" personnel INNER JOIN personne ON id_personne=id_personne_fk_personnel ", " del_personne='0' ") ?></h2>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ik ik-pie-chart"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="lineChart_personnel" class="chart-shadow st-cir-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


<?php
    $letter_month = ['Jav', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sep', 'Oct', 'Nov', 'Dec'];
    $abcisse = [];
    $ordonne_prestation = [];
    $ordonne_recette = [];
    $ordonne_docteur = [];
    $ordonne_batiment = [];
    $ordonne_equipement = [];
    $ordonne_personnel = [];
    $data_patient = [];
    $data_rendez_vous = [];
    $data_specialite = [];
    $data_departement = [];
    $data_depense = [];
    $data_magasin = [];
    for($i=0;$i<12;$i++){
        $moins = "-".$i." months";
        array_unshift($abcisse, $letter_month[date("m", strtotime($moins))-1]);


         $now = new DateTime();
         $now->modify($moins);
         $began_month = $now->modify('first day of this month')->format("Y-m-d");
         $end_month = $now->modify('last day of this month')->format("Y-m-d");


        $statement = $bdd->prepare("SELECT * FROM prestation WHERE del_prestation='0' AND date_create_prestation BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($ordonne_prestation, $statement->rowCount());
        
        $statement = $bdd->prepare("SELECT * FROM recette WHERE del_recette='0' AND date_create_recette BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($ordonne_recette, $statement->rowCount());

        $statement = $bdd->prepare("SELECT * FROM docteur INNER JOIN personne ON id_personne=id_personne_fk_docteur WHERE del_personne='0' AND date_create_personne BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($ordonne_docteur, $statement->rowCount());

        $statement = $bdd->prepare("SELECT * FROM batiment WHERE del_batiment='0' AND date_create_batiment BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($ordonne_batiment, $statement->rowCount());
        
        $statement = $bdd->prepare("SELECT * FROM equipement WHERE del_equipement='0' AND date_create_equipement BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($ordonne_equipement, $statement->rowCount());

        $statement = $bdd->prepare("SELECT * FROM personnel INNER JOIN personne ON id_personne=id_personne_fk_personnel WHERE del_personne='0' AND date_create_personne BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($ordonne_personnel, $statement->rowCount());

        $statement = $bdd->prepare("SELECT * FROM patient INNER JOIN personne ON id_personne=id_personne_fk_patient WHERE del_personne='0' AND date_create_personne BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($data_patient, [$letter_month[date("m", strtotime($moins))-1], $statement->rowCount()]);

        $statement = $bdd->prepare("SELECT * FROM rendez_vous WHERE del_rendez_vous='0' AND date_create_rendez_vous BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($data_rendez_vous, [$letter_month[date("m", strtotime($moins))-1], $statement->rowCount()]);

        $statement = $bdd->prepare("SELECT * FROM specialite WHERE del_specialite='0' AND date_create_specialite BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($data_specialite, [$letter_month[date("m", strtotime($moins))-1], $statement->rowCount()]);

        $statement = $bdd->prepare("SELECT * FROM departement WHERE del_departement='0' AND date_create_departement BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($data_departement, "{'date': '".date('m-Y', strtotime($moins))."', 'market1': ".$statement->rowCount()."}");

        $statement = $bdd->prepare("SELECT * FROM depense WHERE del_depense='0' AND date_create_depense BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($data_depense, "{'date': '".date('m-Y', strtotime($moins))."', 'market1': ".$statement->rowCount()."}");

        $statement = $bdd->prepare("SELECT * FROM magasin WHERE del_magasin='0' AND date_create_magasin BETWEEN ? AND ?");
        $statement->execute(array($began_month,$end_month));
        array_unshift($data_magasin, "{'date': '".date('m-Y', strtotime($moins))."', 'market1': ".$statement->rowCount()."}");

    }
?>
                    </div>
                </div>


                <?php include("../parts/footer.php") ?>             
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
        <script src="../scripts_js/js/charts.js"></script>
        <script src="../dist/js/theme.min.js"></script>
        <script src="../plugins/chartist/dist/chartist.min.js"></script>
        <script src="../plugins/flot-charts/jquery.flot.js"></script>
        <script src="../plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="../plugins/flot-charts/jquery.flot.pie.js"></script>
        <script src="../plugins/flot-charts/curvedLines.js"></script>
        <script src="../plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="../plugins/amcharts/amcharts.js"></script>
        <script src="../plugins/amcharts/gauge.js"></script>
        <script src="../plugins/amcharts/serial.js"></script>
        <script src="../plugins/amcharts/themes/light.js"></script>
        <script src="../plugins/amcharts/animate.min.js"></script>
        <script src="../plugins/amcharts/pie.js"></script>
        <script src="../plugins/ammap3/ammap/ammap.js"></script>
        <script src="../plugins/ammap3/ammap/maps/js/usaLow.js"></script>



        <script>
            $(document).ready(function() {
                
                new Chartist.Line('#lineChart_area_prestation', {
                    labels: <?php echo '["'.implode('", "', $abcisse).'"]'; ?>,
                    series: [
                        <?php echo '['.implode(', ', $ordonne_prestation).']'; ?>
                    ]
                }, {
                    low: 0,
                    showArea: true
                });
                new Chartist.Line('#lineChart_area_recette', {
                    labels: <?php echo '["'.implode('", "', $abcisse).'"]'; ?>,
                    series: [
                        <?php echo '['.implode(', ', $ordonne_recette).']'; ?>
                    ]
                }, {
                    low: 0,
                    showArea: true
                });
                new Chartist.Line('#lineChart_area_docteur', {
                    labels: <?php echo '["'.implode('", "', $abcisse).'"]'; ?>,
                    series: [
                        <?php echo '['.implode(', ', $ordonne_docteur).']'; ?>
                    ]
                }, {
                    low: 0,
                    showArea: true
                });




                $(window).on('resize', function() {
                    categoryChartPatient();
                    categoryChartRendezVous();
                    categoryChartSpecialite();
                });
                categoryChartPatient();
                categoryChartRendezVous();
                categoryChartSpecialite();
                function categoryChartPatient() {
                    var data = <?php echo(json_encode($data_patient)); ?>;
                    $.plot("#placeholder_patient", [data], {
                        series: {
                            bars: {
                                show: true,
                                barWidth: 0.6,
                                align: "center",
                            }
                        },
                        xaxis: {
                            mode: "categories",
                            tickLength: 0,
                            tickColor: '#f5f5f5',
                        },
                        colors: ["#01C0C8", "#83D6DE"],
                        labelBoxBorderColor: "red"
                    });
                };
                function categoryChartRendezVous() {
                    var data = <?php echo(json_encode($data_rendez_vous)); ?>;
                    $.plot("#placeholder_rendez_vous", [data], {
                        series: {
                            bars: {
                                show: true,
                                barWidth: 0.6,
                                align: "center",
                            }
                        },
                        xaxis: {
                            mode: "categories",
                            tickLength: 0,
                            tickColor: '#f5f5f5',
                        },
                        colors: ["#01C0C8", "#83D6DE"],
                        labelBoxBorderColor: "red"
                    });
                };
                function categoryChartSpecialite() {
                    var data = <?php echo(json_encode($data_specialite)); ?>;
                    $.plot("#placeholder_specialite", [data], {
                        series: {
                            bars: {
                                show: true,
                                barWidth: 0.6,
                                align: "center",
                            }
                        },
                        xaxis: {
                            mode: "categories",
                            tickLength: 0,
                            tickColor: '#f5f5f5',
                        },
                        colors: ["#01C0C8", "#83D6DE"],
                        labelBoxBorderColor: "red"
                    });
                };





                new Chartist.Line('#lineChart_batiment', {
                    labels: <?php echo '["'.implode('", "', $abcisse).'"]'; ?>,
                    series: [
                        <?php echo '['.implode(', ', $ordonne_batiment).']'; ?>
                    ]
                }, {
                    fullWidth: true,
                    chartPadding: {
                        right: 40
                    }
                });
                new Chartist.Line('#lineChart_equipement', {
                    labels: <?php echo '["'.implode('", "', $abcisse).'"]'; ?>,
                    series: [
                        <?php echo '['.implode(', ', $ordonne_equipement).']'; ?>
                    ]
                }, {
                    fullWidth: true,
                    chartPadding: {
                        right: 40
                    }
                });
                new Chartist.Line('#lineChart_personnel', {
                    labels: <?php echo '["'.implode('", "', $abcisse).'"]'; ?>,
                    series: [
                        <?php echo '['.implode(', ', $ordonne_personnel).']'; ?>
                    ]
                }, {
                    fullWidth: true,
                    chartPadding: {
                        right: 40
                    }
                });



                
                var chart = AmCharts.makeChart("line_chart_departement", {
                    "type": "serial",
                    "theme": "light",
                    "dataDateFormat": "MM-YYYY",
                    "precision": 2,
                    "valueAxes": [{
                        "id": "v1",
                        "position": "left",
                        "autoGridCount": false,
                        "labelFunction": function(value) {
                            return "$" + Math.round(value) + "M";
                        }
                    }, {
                        "id": "v2",
                        "gridAlpha": 0,
                        "autoGridCount": false
                    }],
                    "graphs": [{
                        "id": "g1",
                        "valueAxis": "v2",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 8,
                        "hideBulletsCount": 50,
                        "lineThickness": 3,
                        "lineColor": "#2ed8b6",
                        "title": "Départements",
                        "useLineColorForBulletBorder": true,
                        "valueField": "market1",
                        "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
                    }],
                    "chartCursor": {
                        "pan": true,
                        "valueLineEnabled": true,
                        "valueLineBalloonEnabled": true,
                        "cursorAlpha": 0,
                        "valueLineAlpha": 0.2
                    },
                    "categoryField": "date",
                    "categoryAxis": {
                        "parseDates": true,
                        "dashLength": 1,
                        "minorGridEnabled": true
                    },
                    "legend": {
                        "useGraphSettings": true,
                        "position": "top"
                    },
                    "balloon": {
                        "borderThickness": 1,
                        "shadowAlpha": 0
                    },
                    "dataProvider": [<?php echo (implode(", ",$data_departement)); ?>]
                });
                var chart = AmCharts.makeChart("line_chart_depense", {
                    "type": "serial",
                    "theme": "light",
                    "dataDateFormat": "MM-YYYY",
                    "precision": 2,
                    "valueAxes": [{
                        "id": "v1",
                        "position": "left",
                        "autoGridCount": false,
                        "labelFunction": function(value) {
                            return "$" + Math.round(value) + "M";
                        }
                    }, {
                        "id": "v2",
                        "gridAlpha": 0,
                        "autoGridCount": false
                    }],
                    "graphs": [{
                        "id": "g1",
                        "valueAxis": "v2",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 8,
                        "hideBulletsCount": 50,
                        "lineThickness": 3,
                        "lineColor": "#2ed8b6",
                        "title": "Dépenses",
                        "useLineColorForBulletBorder": true,
                        "valueField": "market1",
                        "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
                    }],
                    "chartCursor": {
                        "pan": true,
                        "valueLineEnabled": true,
                        "valueLineBalloonEnabled": true,
                        "cursorAlpha": 0,
                        "valueLineAlpha": 0.2
                    },
                    "categoryField": "date",
                    "categoryAxis": {
                        "parseDates": true,
                        "dashLength": 1,
                        "minorGridEnabled": true
                    },
                    "legend": {
                        "useGraphSettings": true,
                        "position": "top"
                    },
                    "balloon": {
                        "borderThickness": 1,
                        "shadowAlpha": 0
                    },
                    "dataProvider": [<?php echo (implode(", ",$data_depense)); ?>]
                });
                var chart = AmCharts.makeChart("line_chart_magasin", {
                    "type": "serial",
                    "theme": "light",
                    "dataDateFormat": "MM-YYYY",
                    "precision": 2,
                    "valueAxes": [{
                        "id": "v1",
                        "position": "left",
                        "autoGridCount": false,
                        "labelFunction": function(value) {
                            return "$" + Math.round(value) + "M";
                        }
                    }, {
                        "id": "v2",
                        "gridAlpha": 0,
                        "autoGridCount": false
                    }],
                    "graphs": [{
                        "id": "g1",
                        "valueAxis": "v2",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 8,
                        "hideBulletsCount": 50,
                        "lineThickness": 3,
                        "lineColor": "#2ed8b6",
                        "title": "Magasins",
                        "useLineColorForBulletBorder": true,
                        "valueField": "market1",
                        "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
                    }],
                    "chartCursor": {
                        "pan": true,
                        "valueLineEnabled": true,
                        "valueLineBalloonEnabled": true,
                        "cursorAlpha": 0,
                        "valueLineAlpha": 0.2
                    },
                    "categoryField": "date",
                    "categoryAxis": {
                        "parseDates": true,
                        "dashLength": 1,
                        "minorGridEnabled": true
                    },
                    "legend": {
                        "useGraphSettings": true,
                        "position": "top"
                    },
                    "balloon": {
                        "borderThickness": 1,
                        "shadowAlpha": 0
                    },
                    "dataProvider": [<?php echo (implode(", ",$data_magasin)); ?>]
                });

            });
        </script>
    </body>
</html>
