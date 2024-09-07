<?php
    //Connexion à la bd
    try{
        $bdd = new PDO("mysql:host=localhost;port=3306;dbname=tqffjfwm_hospital;charset=utf8","tqffjfwm_hospital","GGGW:ZZb7MGMZwccZ*", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
