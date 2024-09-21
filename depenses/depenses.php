<?php
    include("../control_if_user_is_connected.php");
    $menu_depenses = "active";
    $menu_toutes_les_depenses = "active";
?>
<!doctype html>
<html class="no-js" lang="en">
<?php include("../parts/head.php"); ?>

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
                                            <h5>Liste des dépenses</h5>
                                            <span>Vous verrez ici la liste de toutes les dépenses.</span>
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
                                                <a href="#">Dépenses</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Toutes les dépenses</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" style="display: flex; justify-content: space-between;">
                                        <h3>Liste des dépenses</h3>
                                        <?php
                                            if($_SESSION['id_type_compte'] <= 4){
                                                ?>
                                                <a href="depenses-add.php"><button class="btn btn-primary mr-2">Ajouter une nouvelle dépense</button></a>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <table id="data_table" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Nature / Nom</th>
                                                    <th>Service</th>
                                                    <th>Montant</th>
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




        <script type="text/javascript">

            /* Affichage de la liste */ //changer
            var depensesDataTable = $('#data_table').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url:"depenses-fetch.php", //changer
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


            /* Consulter */
            $(document).on('click', '.view', function(){
                var id_view = $(this).attr("id");
                $.ajax({
                    url:"depenses-fetch-details.php",
                    method:"POST",
                    data:{id_view:id_view},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#modal_view').modal('show');
                        $('.modal-title_view').text("Détails sur la dépense");
                        $('#details').html(data);

                    }
                })
            });


            //Suppression
            $(document).on('click', '.delete', function(){
                var id = $(this).attr('id');
                swal({
                    title: 'Suppression de dépense',
                    text: 'Etes-vous sûre de vouloir supprimer cette dépense ?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url:"depenses-del.php",
                            method:"POST",
                            data:{id:id},
                            dataType: "JSON",
                            success:function(data)
                            {
                                if(data) {
                                    swal('Effectué','La dépense '+data+' a été supprimé.', 'success');
                                }
                                else{
                                    swal("Info", "Vous ne pouvez pas effectuer cette action, car vous utilisez un compte visiteur.", "info")
                                }

                                depensesDataTable.ajax.reload();
                            }
                        });

                    }
                });

            });

        </script>

    </body>
</html>