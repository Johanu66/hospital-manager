<?php
    //Connexion à la bd
    try{
        $bdd = new PDO("pgsql:host=ec2-18-214-134-226.compute-1.amazonaws.com;port=5432;dbname=d4bocphvnml258;","crogdmraipfgom","e7a078082b7d9f65bfede3ddf64cd2b7677347246bcc696ba621959e35bd956b", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
