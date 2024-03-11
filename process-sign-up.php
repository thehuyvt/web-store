<?php
    if(empty($_POST['name'])||empty($_POST['email'])||empty($_POST['password'])||empty($_POST['re_password'])){
        header("Location:./sign-up.php?error=You must fill out complete information");
        exit;
    }

    $name = addslashes($_POST['name']);
    $email =  addslashes($_POST['email']);
    $password =  addslashes($_POST['password']);
    $re_password =  addslashes($_POST['re_password']);

    $regex_email =  "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

    if(!preg_match($regex_email, $email)){
        header("Location:./sign-up.php?error=You must enter the correct email format");
        exit;
    }
    require 'admin/connect.php';

    $sql_check_email = "select count(*) from customers where email = '$email'";
    $result = mysqli_query($conn, $sql_check_email);
    $count_email = mysqli_fetch_array($result);
    if($count_email['count(*)'] == 1){
        header("Location:./sign-up.php?error=Email already exists");
        exit;
    }

    if($password != $re_password){
        header("Location:./sign-up.php?error=Repassword must match the password");
        exit;
    }

    $sql = "Insert into customers(name, email, password) values('$name', '$email', '$password')";

    mysqli_query($conn, $sql);

    $sql_get_id = "select id from customers where email = '$email'";
    $result_id = mysqli_query($conn, $sql_get_id);
    $id = mysqli_fetch_array($result_id)['id'];

    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $id;

    mysqli_close($conn);

    header("Location:./index.php");