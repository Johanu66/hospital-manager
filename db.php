<?php
    //Connexion à la bd
    try{
        $bdd = new PDO("pgsql:host=ec2-52-73-155-171.compute-1.amazonaws.com;dbname=d5rv012b043419","kkbopmuzhzrwow","bb7fe7ee515f7cb3eeca8ee491d6196185dd62bd8f524d1df96de9f41ba3444e", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
