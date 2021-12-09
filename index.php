<?php
    session_start();
    if(isset($_SESSION["id"])){
        header("Location:tb/tb.php");
    }
    else{
        header("Location:connexion.php");
    }