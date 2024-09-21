<?php
    $_TEST_ENV = false;
    if (isset($_POST['submit']) && $_SESSION["id_type_compte"]==0) {
        $_TEST_ENV = true;
        ?>
        <script>swal("Info", "Vous ne pouvez pas effectuer cette action, car vous utilisez un compte visiteur.", "info")</script>
        <?php
    }
?>