<?php
    session_start();
    if(isset($_COOKIE['remember'])){
        $token = $_COOKIE['remember'];
        
        require 'admin/connect.php';
        $sql = "select * from customers where token='$token'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) != 0){
            $data = mysqli_fetch_array($result);
            $_SESSION['id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
        }
    }

    if(!empty($_SESSION['id'])){
        header("Location:./index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <h3>Đăng nhập tài khoản</h3>
    <?php if(isset($_GET['error'])){ ?>
        <span style="color:red;"><?php echo $_GET['error'] ?></span>
    <?php } ?>
    <form action="./process-sign-in.php" method="post">
        Email
        <input type="email" name="email">
        <br>
        Mật khẩu
        <input type="text" name="password">
        <br>
        Ghi nhớ tài khoản
        <input type="checkbox" name="remember">
        <br>
        <input type="submit" value="Đăng nhập">
    </form>
    <p>Bạn chưa có tài khoản? <a href="./sign-up.php">Đăng kí.</a></p>
</body>
</html>