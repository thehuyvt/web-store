<?php
    session_start();
    if($_SESSION['level'] != 2){
        header("Location:../index.php");
        exit;
    }
    require '../connect.php';
    
    if(empty($_GET['id'])){
        header("Location:./index.php?error=Phải truyền mã id để xóa nsx");
    }

    $id = $_GET['id'];

    $sql = "delete from manufacturers
    where id = $id";

    mysqli_query($conn, $sql);
    header("Location:./index.php?success=Xóa nsx thành công");
    
    