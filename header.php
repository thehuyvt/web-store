<?php
    session_start();
    require 'admin/connect.php';
    if(isset($_COOKIE['remember'])){
        $token = $_COOKIE['remember'];

        $sql = "select * from customers where token = '$token'";
        $result = mysqli_query($conn, $sql);
        $result_row = mysqli_num_rows($result);
        if($result_row === 1){
            $data = mysqli_fetch_array($result);
            $_SESSION['id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
        }
    }
    $check_session = empty($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thế giới điện thoại</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div id="header">
        <a href="./index.php" class="header-logo"><img src="https://static.vecteezy.com/system/resources/previews/003/092/544/original/e-commerce-logo-with-pointer-and-shopping-bag-free-vector.jpg" alt="logo"></a>
        <ul class="header-nav">
            <li><a href="./index.php">Trang chủ</a></li>
            <li><a href="">Sản phẩm</a></li>
            <li><a href="./cart.php">Giỏ hàng</a></li>
            <?php if($check_session){?>
                    <li><a href="./sign-in.php">Đăng nhập</a></li>
                    <li><a href="./sign-up.php">Đăng kí</a></li>
            <?php }else{?>
                    <li><a href="./sign-out.php">Đăng xuất</a></li>
            <?php } ?>
            
        </ul>
    </div>