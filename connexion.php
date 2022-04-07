<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Connexion | Hôpital</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="scripts_js/sweetalert/sweetalert.min.js"></script>
    </head>

    <body>
        <?php
            include("db.php");
            include("fonctions_sql.php");
            $mdp_correct = false;
            if(isset($_POST["submit"])){
                $statement = $bdd->prepare("SELECT * FROM compte INNER JOIN personne ON compte.id_personne_fk_compte = personne.id_personne WHERE email_personne = :email");
                $statement->execute(array(':email'	=>	$_POST["email_personne"]));
                if($statement->rowCount() > 0){
                    while($row = $statement->fetch()){
                        if($_POST["mdp_compte"] == $row["mdp_compte"]){
                            if($row["statut_compte"] == "Actif"){
                                if(isset($_POST['remenber_me'])){
                                    setcookie('email',$row["email_personne"],time()+365*24*3600,null,null,false,true);
                                    setcookie('mdp',$row["mdp_compte"],time()+365*24*3600,null,null,false,true);
                                }
                                session_start();
                                $_SESSION['id'] = $row['id_personne'];
                                $_SESSION["nom"] = $row["nom_personne"];
                                $_SESSION["prenom"] = $row["prenom_personne"];
                                $_SESSION["email"] = $row["email_personne"];
                                $_SESSION["id_type_compte"] = $row["id_type_compte_fk_compte"];
                                $_SESSION["photo"] = $row["photo_personne"];
                                $_SESSION["menu"] = get_menu_by_compte($row['id_compte']);
                                header("Location:tb/tb.php");
                            }
                            else{
                                ?>
                                <script>swal("Échoué","Votre compte est Inatif veuillez contacter l'administrateur.","error") </script>
                                <?php
                            }
                            $mdp_correct = true;
                        }
                    }
                    if($mdp_correct == false){
                        ?>
                        <script>swal("Échoué","Identifiant ou mot de passe incorrect.","error") </script>
                        <?php
                    }
                }
                else{
                    ?>
                    <script>swal("Échoué","Identifiant ou mot de passe incorrect.","error") </script>
                    <?php
                }
            }
        ?>

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('img/auth/login-bg.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href="connexion.php"><img src="img/logo.png" width="40" alt=""></a>
                            </div>
                            <h3>Connexion à l'App de gestion hôpitalière</h3>
                            <p>Ravi de vous revoir!</p>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" name="email_personne" class="form-control" placeholder="Email" required="" value="johanugandonou@gmail.com">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="mdp_compte" class="form-control" placeholder="Password" required="" value="1234">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="remenber_me" value="option1">
                                            <span class="custom-control-label">&nbsp;Se rapeller de moi</span>
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a href="forgot-password.html">Mot de passe oublié ?</a>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <input type="submit" value="Se connecter" name="submit" class="btn btn-theme">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="assets/modules/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="dist/js/theme.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
