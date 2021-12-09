<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></span>
                        <img class="avatar" src="../img/personnes/<?php echo $_SESSION['photo']; ?>" alt="Photo de profil">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#"><i class="ik ik-user dropdown-icon"></i> Mon profil</a>
                        <a class="dropdown-item" href="../deconnexion.php"><i class="ik ik-power dropdown-icon"></i> Se déconnecter</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>