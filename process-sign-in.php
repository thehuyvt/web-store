<?php
    if(empty($_POST['email'])||empty($_POST['password'])){
        header('Location:./sign-in.php?error=You must fill out complete information.');
        exit;
    }

    if(isset($_POST['remember'])){
        $remember = true;
    }else{
        $remember = false;
    }

    require 'admin/connect.php';
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $sql = "select * from customers where email ='$email' and password = '$password'";

    // die($sql);
    $result = mysqli_query($conn, $sql);
    $result_row = mysqli_num_rows($result);

    if($result_row == 1){
        $data = mysqli_fetch_array($result);
        session_start();
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];
        if($remember){
            $id =$data['id'];
            $token = uniqid('user_', true).time();
            
            setcookie("remember", $token, time() + 84600 * 30);

            $sql_set_token = "update customers
            set
            token='$token'
            where id='$id'";

            mysqli_query($conn, $sql_set_token);
            // die($sql_set_token);
        }
        header("Location:./index.php");
        exit;
    }

    header("Location:./sign-in.php?error=Your email or password is not correct!");