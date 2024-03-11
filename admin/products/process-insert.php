<?php
    if(empty($_POST['name']) 
    || empty($_POST['description']) 
    || empty($_POST['price']) 
    || empty($_POST['manufacturer_id'])
    || ($_FILES['image']['size'] == 0)){
        header("Location:./form-insert.php?error=Must fill out complete information!");
        exit;
    }

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $manufacturer_id = $_POST['manufacturer_id'];
    $image = $_FILES['image'];
    // print_r($image);
    // die();

    $folder = "../uploads/";
    $file_type = explode(".", $image['name'])[1];

    //kiem tra file
    if($file_type != "png" && $file_type != "jpg" 
    && $file_type != "jpeg" && $file_type != "gif"){
        header("Location:./form-insert.php?error=Only jpg, jpeg, png and gif files are allowed.");
        exit;
    }

    $file_name = time() . "." . $file_type;
    //dia chỉ file 
    $target_file = $folder . $file_name;

    //day file toi muc uploads
    move_uploaded_file($image['tmp_name'], $target_file);

    require '../connect.php';

    $sql = "Insert into 
    products(name, price, description, image, manufacturer_id) 
    values ('$name', $price, '$description', '$file_name', '$manufacturer_id')";

    // die($sql);

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('Location:./index.php?success=Created product successful');