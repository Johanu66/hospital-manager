<?php
    //Connexion à la bd
    try{
        $bdd = new PDO("mysql:host=localhost;port=3306;dbname=hospital;charset=utf8","root","", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
