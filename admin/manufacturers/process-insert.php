<?php
    session_start();
    if($_SESSION['admin_level'] != 2){
        header("Location:../index.php");
        exit;
    }

    if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['image'])){
        header("Location:./form-insert.php?error=Phải nhập đầy đủ thông tin");
        exit();
    }

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $image = $_POST['image'];

    require '../connect.php';

    $sql = "insert into manufacturers(name, address, phone, image) 
    values ('$name', '$address', '$phone', '$image')";
    
    mysqli_query($conn, $sql);
    header("Location:./index.php?success=Thêm nhà sản xuất thành công!");
    mysqli_close($conn);
