<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<body>
    <?php
        require '../connect.php';
        $sql = "Select * from manufacturers";
        $list_manufacturers = mysqli_query($conn, $sql);
    ?>
    <?php if(isset($_GET['error'])){ ?>
        <span style="color:red;"><?php echo $_GET['error'] ?></span>
    <?php } ?>
    <form action="process-insert.php" method="post" enctype="multipart/form-data">
        Tên sản phẩm
        <input type="text" name="name">
        <br>
        Ảnh
        <input type="file" name="image">
        <br>
        Mô tả
        <textarea name="description" cols="20" rows="4"></textarea>
        <br>
        Giá
        <input type="number" name="price">
        <br>
        Nhà sản xuất
        <select name="manufacturer_id">
            <?php foreach($list_manufacturers as $data){?>
                    <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
            <?php } ?>
        </select>
        <br>
        <input type="submit" value="Thêm sản phẩm">
    </form>
</body>
</html>