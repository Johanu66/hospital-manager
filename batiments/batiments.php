<?php
    include("../control_if_user_is_connected.php");
    $menu_batiments = "active";
    $menu_tous_les_batiments = "active";
?>
<!doctype html>
<html lang="fr">
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
        <script src="../scripts_js/sweetalert/sweetalert.min.js"></script>
        <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>
        <style>
            .table{
                border: solid 2px #eee;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <?php include("../parts/header.php") ?>
            <div class="page-wrap">
                <?php include("../parts/sidebar.php") ?>

                <?php
                    if(isset($_GET['success'])){
                        ?>
                        <script>swal("Effectué", "<?php echo $_GET['success']; ?>", "success")</script>
                        <?php
                    }
                ?>

                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-inbox bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Liste des bâtiments</h5>
                                            <span>Vous verrez ici la liste de tous les bâtiments.</span>
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
                                                <a href="#">Bâtiments</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Tous les bâtiments</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" style="display: flex; justify-content: space-between;">
                                        <h3>Liste des bâtiments</h3>
                                        <?php
                                            if($_SESSION['id_type_compte'] <= 4){
                                                ?>
                                                <a href="batiments-add.php"><button class="btn btn-primary mr-2">Ajouter un nouveau bâtiment</button></a>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <table id="data_table" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="nosort">Photo</th>
                                                    <th>Nom</th>
                                                    <th>Statut</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include("../parts/footer.php") ?>             
            </div>
        </div>
        

        <div id="modal_view" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="form_view">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title_view"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div id="details"></div>
                        </div>

                    </div>
                </form>
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
        <script src="../js/tables.js"></script>
        <script src="../js/widgets.js"></script>
        <script src="../js/charts.js"></script>
        <script src="../dist/js/theme.min.js"></script>


        
        <!-- JS Libraies -->
        <script src="../assets/modules/datatables/datatables.min.js"></script>
        <script src="../assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script src="../assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
        <script src="../assets/modules/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/modules/sweetalert/sweetalert.min.js"></script>

        <!-- Page Specific JS File -->
        <script src="../assets/js/page/modules-datatables.js"></script>
        
        <!-- Template JS File -->
        <script src="../assets/js/scripts.js"></script>
        <script src="../assets/js/custom.js"></script>

        
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

        <script type="text/javascript">

            /* Affichage de la liste */ //changer
            var batimentsDataTable = $('#data_table').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url:"batiments-fetch.php", //changer
                    dataType:"json",
                    type:"POST"
                },
                "columnDefs":[
                    {
                        "targets":[], // changer l'index des colonnes qui ne seront pas triées
                        "orderable":false,
                    },
                ],
                //"bSort" : false,
                "pageLength": 10
            });

            //Consulter
            $(document).on('click', '.view', function(){
                var id_view = $(this).attr("id");
                $.ajax({
                    url:"batiments-fetch-details.php",
                    method:"POST",
                    data:{id_view:id_view},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#modal_view').modal('show');
                        $('.modal-title_view').text("Détails sur le batiment");
                        $('#details').html(data);

                    }
                })
            });

            //Suppression
            $(document).on('click', '.delete', function(){
                var id = $(this).attr('id');
                swal({
                    title: 'Suppression de batiment',
                    text: 'Etes-vous sûre de vouloir supprimer ce batiment ?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url:"batiments-del.php",
                            method:"POST",
                            data:{id:id},
                            dataType: "JSON",
                            success:function(data)
                            {
                                if(data) {
                                    swal('Effectué','Le batiment '+data+' a été supprimé.', 'success');
                                }
                                else{
                                    swal('Échoué','La suppression a échouée.', 'error');
                                }

                                batimentsDataTable.ajax.reload();
                            }
                        });

                    }
                });

            });


        </script>

    </body>
</html>
