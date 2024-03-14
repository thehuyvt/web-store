<?php
    session_start();

    unset($_SESSION['id']);
    unset($_SESSION['name']);
    setcookie("remember", '', -1);

    header("Location:./index.php");