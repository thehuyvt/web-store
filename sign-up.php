<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí tài khoản</title>
</head>
<body>
    <h3>Đăng kí tài khoản</h3>
    <?php if(isset($_GET['error'])){ ?>
        <span style="color:red;"><?php echo $_GET['error'] ?></span>
    <?php } ?>
    <form action="process-sign-up.php" method="post">
        Tên
        <input type="text" name="name">
        <br>

        Email
        <input type="email" name="email">
        <br>

        Password
        <input type="password" name="password">
        <br> 

        Repassword
        <input type="password" name="re_password">
        <br>

        <input type="submit" value="Đăng kí">
    </form>
</body>
</html>