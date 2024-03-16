<?php
    session_start();
    if(!empty($_COOKIE['remember_admin'])){
        require './connect.php';
        $token = $_COOKIE['remember_admin'];
        $sql_admin_by_token = "select * from admin where token='$token'";
        $admin_account = mysqli_fetch_array(mysqli_query($conn, $sql_admin_by_token));
        $_SESSION['admin_id'] = $admin_account['id'];
        $_SESSION['admin_name'] = $admin_account['name'];
        $_SESSION['admin_level'] = $admin_account['level'];
    }

    if(!empty($_SESSION['admin_id'])){
        header("Location:./root/index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập quản trị viên</title>
</head>
<body>
    <h3>Đăng nhập tài khoản</h3>
    <form action="./process-login-admin.php" method="post">
        Email
        <input type="email" name="email">
        <br>
        Mật khẩu
        <input type="password" name="password">
        <br>
        Ghi nhớ tài khoản
        <input type="checkbox" name="remember">
        <br>
        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>