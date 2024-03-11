<?php
    if(empty($_POST['id'])){
        header("Location:./index.php?error=Must have id for update product!");
        exit;
    }

    $id = $_POST['id'];

    if(empty($_POST['name'])
    ||empty($_POST['price'])
    ||empty($_POST['description'])
    ||empty($_POST['manufacturer_id'])){
        header("Location:./form-update.php?id=$id&error=Must fill out complete information!");
        exit;
    }

    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $manufacturer_id = $_POST['manufacturer_id'];

    $sql = "update products 
        set 
        name = '$name',
        price = $price,
        description = '$description',
        manufacturer_id = '$manufacturer_id'
        where id = '$id'";

    $new_image = $_FILES['new_image'];
    if($new_image['size'] != 0){
        $folder = "../uploads/";
        $file_type = explode(".", $new_image['name'])[1]; 
        //kiem tra file
        if($file_type != "png" && $file_type != "jpg" 
        && $file_type != "jpeg" && $file_type != "gif"){
            header("Location:./form-update.php?error=Only jpg, jpeg, png and gif files are allowed.");
            exit;
        }
        $file_name = time() . "." . $file_type;
        
        $target_file = $folder . $file_name;

        move_uploaded_file($new_image['tmp_name'], $target_file);

        $sql = "update products 
        set 
        name = '$name',
        price = $price,
        description = '$description',
        image = '$file_name',
        manufacturer_id = '$manufacturer_id'
        where id = '$id'";
    }

    require '../connect.php';

    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("Location:./index.php?success=Update product successful");