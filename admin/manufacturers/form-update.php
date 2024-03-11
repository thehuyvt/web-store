<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa nhà sản xuất</title>
</head>
<body>
    <?php  
        if(!isset($_GET['id'])){
            header("Location:./index.php?error=Phải truyền mã id");
        }
        $id = $_GET['id'];
        require '../connect.php';

        $sql = "select * from manufacturers where id = $id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        if(empty($data)){
            header("Location:/index.php?error=Id không tồn tại");
            exit;
        }
        
    ?>
    <?php if(isset($_GET['error'])){ ?>
        <span style="color:red;"><?php echo $_GET['error'] ?></span>
    <?php } ?>
    <form action="./process-update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        Tên
        <input type="text" name="name" value="<?php echo $data['name'] ?>">
        <br>
        Địa chỉ
        <input type="text" name="address" value="<?php echo $data['address'] ?>">
        <br>
        Điện thoại
        <input type="text" name="phone" value="<?php echo $data['phone'] ?>">
        <br>
        Ảnh
        <input type="text" name="image" value="<?php echo $data['image'] ?>">
        <br>
        <input type="submit" value="Sửa nhà sản xuất">
    </form>
</body>
</html>