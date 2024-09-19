<?php
    //Connexion à la bd
    try{
        $bdd = new PDO("mysql:host=localhost;dbname=tqffjfwm_hospital;charset=utf8","tqffjfwm_hospital","i=ii_iZR_i@11Z^71#", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
