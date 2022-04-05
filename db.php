<?php
    //Connexion à la bd
    try{
        $bdd = new PDO("pgsql:host=ec2-18-210-64-223.compute-1.amazonaws.com;port=5432;dbname=d247ipb6vvqjje;","izkgcpzshxeemb","8d6000fb254111077258a22b963714c5f0131b97bfda5943f4c2ca7ee49f16f2", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
