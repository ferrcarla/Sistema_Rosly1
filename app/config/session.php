<?php
    session_start();
    if (!isset($_SESSION['user_sesion'])) {
        header("location: ".ROOT.'logout.php');
        exit;
    }
?>