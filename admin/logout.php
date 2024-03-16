<?php
    session_start();
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_level']);

    setcookie("remember_admin", "", -1);
    header("Location:./index.php");