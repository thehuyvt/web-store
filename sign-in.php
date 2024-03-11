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
        Password
        <input type="password" name="password">
        <br>
        <input type="submit" value="Đăng nhập">
    </form>
    <p>Bạn chưa có tài khoản?, <a href="./sign-up.php">Đăng kí.</a></p>
</body>
</html>