<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">
            <div class="logo-img">
            <img src="../img/logo.png" width="30" class="header-brand-img" alt="lavalite"> 
            </div>
            <span class="text">Hôpital</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <?php
                    if(in_array("tableau_de_bord", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item <?php if(isset($menu_tb)) echo($menu_tb); ?>">
                            <a href="../tb/tb.php"><i class="ik ik-bar-chart-2"></i><span>Tableau de bord</span></a>
                        </div>
                        <?php
                    }
                    if(in_array("prestations", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_prestations)) echo($menu_prestations); ?>">
                            <a href="#"><i class="ik ik-menu"></i><span>Prestation</span></a>
                            <div class="submenu-content">
                                <a href="../prestations/prestations.php" class="menu-item <?php if(isset($menu_toutes_les_prestations)) echo($menu_toutes_les_prestations); ?>">Toutes les prestations</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../prestations/prestations-add.php" class="menu-item <?php if(isset($menu_ajout_prestations)) echo($menu_ajout_prestations); ?>">Ajouter une prestation</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("recette", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_recettes)) echo($menu_recettes); ?>">
                            <a href="#"><i class="ik ik-aperture"></i><span>Recette</span></a>
                            <div class="submenu-content">
                                <a href="../recettes/recettes.php" class="menu-item <?php if(isset($menu_toutes_les_recettes)) echo($menu_toutes_les_recettes); ?>">Toutes les recettes</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../recettes/recettes-add.php" class="menu-item <?php if(isset($menu_ajout_recettes)) echo($menu_ajout_recettes); ?>">Ajouter une recette</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("docteurs", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_docteurs)) echo($menu_docteurs); ?>">
                            <a href="#"><i class="ik ik-layers"></i><span>Docteurs</span></a>
                            <div class="submenu-content">
                                <a href="../docteurs/docteurs.php" class="menu-item <?php if(isset($menu_tous_les_docteurs)) echo($menu_tous_les_docteurs); ?>">Tous les Docteurs</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../docteurs/docteurs_add.php" class="menu-item <?php if(isset($menu_ajout_docteurs)) echo($menu_ajout_docteurs); ?>">Ajouter un Docteur</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("patients", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_patients)) echo($menu_patients); ?>">
                            <a href="#"><i class="ik ik-box"></i><span>Patients</span></a>
                            <div class="submenu-content">
                                <a href="../patients/patients.php" class="menu-item <?php if(isset($menu_tous_les_patients)) echo($menu_tous_les_patients); ?>">Tous les patients</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../patients/patients_add.php" class="menu-item <?php if(isset($menu_ajout_patients)) echo($menu_ajout_patients); ?>">Ajouter un patient</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("rendez_vous", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_rendez_vous)) echo($menu_rendez_vous); ?>">
                            <a href="#"><i class="ik ik-gitlab"></i><span>Rendez-vous</span></a>
                            <div class="submenu-content">
                                <a href="../rendez-vous/rendez-vous.php" class="menu-item <?php if(isset($menu_tous_les_rendez_vous)) echo($menu_tous_les_rendez_vous); ?>">Tous les rendez-vous</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../rendez-vous/rendez-vous-add.php" class="menu-item <?php if(isset($menu_ajout_rendez_vous)) echo($menu_ajout_rendez_vous); ?>">Ajouter un rendez-vous</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("planning_des_docteurs", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_planning_docteurs)) echo($menu_planning_docteurs); ?>">
                            <a href="#"><i class="ik ik-package"></i><span>Planning des Docteurs</span></a>
                            <div class="submenu-content">
                                <a href="../planning-des-docteurs/planning-des-docteurs.php" class="menu-item <?php if(isset($menu_tous_les_planning_docteurs)) echo($menu_tous_les_planning_docteurs); ?>">Tous les plannings</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../planning-des-docteurs/planning-des-docteurs-add.php" class="menu-item <?php if(isset($menu_ajout_planning_docteurs)) echo($menu_ajout_planning_docteurs); ?>">Ajouter un planning</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("specialites", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_specialites)) echo($menu_specialites); ?>">
                            <a href="#"><i class="ik ik-command"></i><span>Spécialités</span></a>
                            <div class="submenu-content">
                                <a href="../specialites/specialites.php" class="menu-item <?php if(isset($menu_tous_les_specialites)) echo($menu_tous_les_specialites); ?>">Toutes les spécialités</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../specialites/specialites_add.php" class="menu-item <?php if(isset($menu_ajout_specialites)) echo($menu_ajout_specialites); ?>">Ajouter une spécialité</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("departements", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_departements)) echo($menu_departements); ?>">
                            <a href="javascript:void(0)"><i class="ik ik-edit"></i><span>Services</span></a>
                            <div class="submenu-content">
                                <a href="../departements/departements.php" class="menu-item <?php if(isset($menu_tous_les_departements)) echo($menu_tous_les_departements); ?>">Tous les services</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../departements/departements_add.php" class="menu-item <?php if(isset($menu_ajout_departements)) echo($menu_ajout_departements); ?>">Ajouter un service</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("depenses", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_depenses)) echo($menu_depenses); ?>">
                            <a href="#"><i class="ik ik-calendar"></i><span>Dépenses</span></a>
                            <div class="submenu-content">
                                <a href="../depenses/depenses.php" class="menu-item <?php if(isset($menu_toutes_les_depenses)) echo($menu_toutes_les_depenses); ?>">Toutes les dépenses</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../depenses/depenses-add.php" class="menu-item <?php if(isset($menu_ajout_depenses)) echo($menu_ajout_depenses); ?>">Ajouter une dépense</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("magasins", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_magasins)) echo($menu_magasins); ?>">
                            <a href="#"><i class="ik ik-grid"></i><span>Magasins</span></a>
                            <div class="submenu-content">
                                <a href="../magasins/magasins.php" class="menu-item <?php if(isset($menu_tous_les_magasins)) echo($menu_tous_les_magasins); ?>">Tous les magasins</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../magasins/magasins-add.php" class="menu-item <?php if(isset($menu_ajout_magasins)) echo($menu_ajout_magasins); ?>">Ajouter un magasin</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("batiments", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_batiments)) echo($menu_batiments); ?>">
                            <a href="#"><i class="ik ik-home"></i><span>Bâtiments</span></a>
                            <div class="submenu-content">
                                <a href="../batiments/batiments.php" class="menu-item <?php if(isset($menu_tous_les_batiments)) echo($menu_tous_les_batiments); ?>">Tous les bâtiments</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../batiments/batiments-add.php" class="menu-item <?php if(isset($menu_ajout_batiments)) echo($menu_ajout_batiments); ?>">Ajouter un bâtiment</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("equipements", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_equipements)) echo($menu_equipements); ?>">
                            <a href="#"><i class="ik ik-credit-card"></i><span>Équipements</span></a>
                            <div class="submenu-content">
                                <a href="../equipements/equipements.php" class="menu-item <?php if(isset($menu_tous_les_equipements)) echo($menu_tous_les_equipements); ?>">Tous les équipements</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../equipements/equipements-add.php" class="menu-item <?php if(isset($menu_ajout_equipements)) echo($menu_ajout_equipements); ?>">Ajouter un équipement</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("personnels", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item has-sub <?php if(isset($menu_personnels)) echo($menu_personnels); ?>">
                            <a href="#"><i class="ik ik-pie-chart"></i><span>Personnels</span></a>
                            <div class="submenu-content">
                                <a href="../personnels/personnels.php" class="menu-item <?php if(isset($menu_tous_les_personnels)) echo($menu_tous_les_personnels); ?>">Tous les personnels</a>
                                <?php
                                    if($_SESSION['id_type_compte'] <= 4){
                                        ?>
                                        <a href="../personnels/personnels-add.php" class="menu-item <?php if(isset($menu_ajout_personnels)) echo($menu_ajout_personnels); ?>">Ajouter un personnel</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if(in_array("salaires", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item">
                            <a href="#"><i class="ik ik-terminal"></i><span>Salaires</span></a>
                        </div>
                        <?php
                    }
                    if(in_array("journaux", $_SESSION['menu'])){
                        ?>
                        <div class="nav-item">
                            <a href="#"><i class="ik ik-server"></i><span>Journaux</span></a>
                        </div>
                        <?php
                    }
                ?>
            </nav>
        </div>
    </div>
</div>