<?php
    session_start();
    if($_SESSION['admin_level'] != 2){
        header("Location:../index.php");
        exit;
    }

    if(empty($_GET['id'])){
        header("Location:./index.php?error=Must have id for delete product");
    }
    
    require '../connect.php';
    $id = $_GET['id'];
    $sql = "delete from products where id = '$id'";

    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("Location:./index.php?success=Delete product successful");