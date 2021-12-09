<?php
    include("../control_if_user_is_connected.php");
    if(isset($_GET['id'])){
        update(" depense ",[
            "statut_depense" => "Inactif"
        ]," id_depense = '".$_GET['id']."'");
        $statement = $bdd->prepare("SELECT * FROM depense WHERE del_depense='0' AND id_depense = ?");
        $statement->execute(array($_GET['id']));
        $result = $statement->fetch();
        header("Location:depenses.php?success=La dépense ".$result['nom_depense']." est désormais inactif.");
    }