<?php
    session_start();

    session_unset();
    session_destroy();
    header('location:Collage_login.php?q=Logout');
?>