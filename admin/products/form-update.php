<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
</head>
<body>
    <?php
        require '../connect.php';
        $sql = "Select * from manufacturers";
        $list_manufacturers = mysqli_query($conn, $sql);

        if(!isset($_GET['id'])){
            header("Locattion:./index.php?error=Must pass id");
            exit;
        }

        $id = $_GET['id'];

        $product_sql = "Select * from products where id = '$id'";
        $product_array = mysqli_query($conn, $product_sql);
        $product = mysqli_fetch_array($product_array);
    ?>
    <?php if(isset($_GET['error'])){ ?>
        <span style="color:red;"><?php echo $_GET['error'] ?></span>
    <?php } ?>
    <form action="process-update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        Tên sản phẩm
        <input type="text" name="name" value="<?php echo $product['name'] ?>">
        <br>
        Ảnh sản phẩm
        <img src="../uploads/<?php echo $product['image'] ?>" alt="image of product" height="150px">
        <br>
        Thay ảnh mới
        <input type="file" name="new_image">
        <br>
        Mô tả
        <textarea name="description" cols="20" rows="4"><?php echo $product['description'] ?></textarea>
        <br>
        Giá
        <input type="number" name="price" value="<?php echo $product['price'] ?>">
        <br>
        Nhà sản xuất
        <select name="manufacturer_id">
            <?php foreach($list_manufacturers as $data){
                    if($data['id'] == $product['manufacturer_id']){?>
                    <option value="<?php echo $data['id'] ?>" selected ><?php echo $data['name'] ?></option>
                    <?php
                     continue;
                    }?>
                    <option value="<?php echo $data['id'] ?>" ><?php echo $data['name'] ?></option>
            <?php } ?>
        </select>
        <br>
        <input type="submit" value="Cập nhật sản phẩm">
    </form>
</body>
</html>