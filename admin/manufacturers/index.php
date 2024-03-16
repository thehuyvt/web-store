<?php 
    session_start();
    if($_SESSION['admin_level'] != 2){
        header("Location:../index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khu vực nhà sản xuất</title>
    <style>
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<body>
    Đây là khu vực nhà sản xuất
    <?php
        require '../menu.php';
        require '../connect.php';

        $search = "";
        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }
        
        $count_manufacturers_sql = "select count(*) as amount_manufactures 
        from manufacturers 
        where name like '%$search%'";
        $manufacturers_array = mysqli_query($conn, $count_manufacturers_sql);
        $manufacturers_result = mysqli_fetch_array($manufacturers_array);
        
        $current_page = 1;
        if(isset($_GET['page'])){
            $current_page = $_GET['page'];
        }
        // tong so nsx
        $manufacturers_total = $manufacturers_result['amount_manufactures'];
        //so nsx tren 1 trang
        $manufacturers_per_page = 4;
        //tong so trang
        $page_total = ceil($manufacturers_total/$manufacturers_per_page);
        //bo qua so nsx
        $skip_manufacturers = $manufacturers_per_page * ($current_page - 1);
   
        //cau truy van
        $sql = "select * from manufacturers 
        where 
        name like '%$search%' 
        limit $manufacturers_per_page 
        offset $skip_manufacturers";

        $list_manufactureres = mysqli_query($conn, $sql);
    ?>
    <a href="./form-insert.php">Them nsx</a>
    <?php if(isset($_GET['error'])){ ?>
        <span style="color:red;"><?php echo $_GET['error'] ?></span>
    <?php } ?>
    <?php if(isset($_GET['success'])){ ?>
        <span style="color:green;"><?php echo $_GET['success'] ?></span>
    <?php } ?>
    <table style="width:100%; text-align: center;">
        <caption>
            <form action="">
                <input type="search" name="search" value="<?php echo $search ?>">
            </form>
        </caption>
        <tr>
            <th>Mã nsx</th>
            <th>Tên nsx</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Ảnh</th>
            <th>Chức năng</th>
        </tr>
        <?php foreach($list_manufactureres as $data){ ?>
            <tr>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo $data['address'] ?></td>
                <td><?php echo $data['phone'] ?></td>
                <td><img src="<?php echo $data['image'] ?>" height="100px" alt="image"></td>
                <td><a href="./form-update.php?id=<?php echo $data['id']?>">Sửa</a>
                <a href="./delete.php?id=<?php echo $data['id']?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php for($i = 1; $i <= $page_total; $i++){?>
        <a  href="./index.php?page=<?php echo $i ?>&search=<?php echo $search?>"><?php echo $i ?></a>
    <?php } ?>
</body>
</html>