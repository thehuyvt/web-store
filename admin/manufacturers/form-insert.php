<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhà sản xuất</title>
</head>
<body>
    <?php if(isset($_GET['error'])){ ?>
        <span style="color:red;"><?php echo $_GET['error'] ?></span>
    <?php } ?>
    <form action="process-insert.php" method="post">
        Tên
        <input type="text" name="name">
        <br>
        Địa chỉ
        <input type="text" name="address">
        <br>
        Điện thoại
        <input type="text" name="phone">
        <br>
        Ảnh
        <input type="text" name="image">
        <br>
        <input type="submit" value="Tạo nhà sản xuất">
    </form>
</body>
</html>