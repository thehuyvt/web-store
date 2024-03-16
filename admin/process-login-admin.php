<?php 
    session_start();
    require './connect.php';

    if(!empty($_SESSION['admin_id'])){
        header("Location:./root/index.php");
        exit;
    }
    
    if(empty($_POST['email'])||empty($_POST['password'])){
        header("Location:./index.php?error=Must fill both email and password");
        exit;
    }
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    $sql = "select * from admin where email = '$email' and password = '$password'";

    $result = mysqli_query($conn, $sql);
    $result_row = mysqli_num_rows($result);
    if($result_row != 1){
        header("Location:./index.php?error=Your email or password are incorrected!");
        exit;
    }

    $account = mysqli_fetch_array($result);
    $id = $account['id'];
    $_SESSION['admin_id'] = $account['id'];
    $_SESSION['admin_name'] = $account['name'];
    $_SESSION['admin_level'] = $account['level'];

    if(!empty($_POST['remember'])){
        $token = uniqid("admin_", true).time();

        $sql_cookie = "update admin
        set
        token = '$token'
        where id = '$id'";

        mysqli_query($conn, $sql_cookie);

        setcookie('remember_admin', $token, time() + 84600 * 30);
    }
    mysqli_close($conn);
    header("Location:./root/index.php");


