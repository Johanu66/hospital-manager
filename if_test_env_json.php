<?php
    $_TEST_ENV = false;
    if ($_SESSION["id_type_compte"]==0) {
        $_TEST_ENV = true;
        header('Content-Type: application/json');
        echo json_encode(null);
    }
?>