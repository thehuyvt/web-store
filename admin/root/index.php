<?php 
    session_start();
    if(empty($_SESSION['admin_level'])){
        header("Location:../index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đây là khu vực admin</title>
</head>
<body>
    <h3>Đây là khu vực admin, xin chào <?php echo $_SESSION['admin_name'] ?></h3>
    <?php
        require('../menu.php');
    ?>
    
</body>
</html>