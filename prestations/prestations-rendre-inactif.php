<?php
    include("../control_if_user_is_connected.php");

    if (isset($_GET['id'])) {
        // Mettre à jour le statut de la prestation à 'Inactif'
        update("prestation", [
            "statut_prestation" => "Inactif"
        ], "id_prestation = '" . $_GET['id'] . "'");
        
        // Préparer la requête avec un paramètre nommé
        $statement = $bdd->prepare("SELECT * FROM prestation WHERE id_prestation = :id_prestation");
        
        // Exécuter la requête avec l'ID passé dans l'URL
        $statement->execute(array(':id_prestation' => $_GET['id']));
        
        // Récupérer le résultat
        $result = $statement->fetch();
        
        // Rediriger avec un message de succès
        header("Location: prestations.php?success=La prestation " . $result['nom_prestation'] . " est désormais inactive.");
    }
?>
