<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí sản phẩm</title>
    <style>
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<body>
    Phần quản lí sản phẩm
    <?php
        require '../menu.php';
        require '../connect.php';

        $search ="";
        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }

        $current_page = 1;
        if(isset($_GET['page'])){
            $current_page = $_GET['page'];
        }

        //amount of products per page
        $products_per_page = 3;

        //product total
        $count_products_sql = "select count(*) as products_total from products where name like '%$search%'";
        $product_total_array = mysqli_query($conn, $count_products_sql);
        $product_total = mysqli_fetch_array($product_total_array)['products_total'];

        $page_total = ceil($product_total/$products_per_page);

        $skip_prodducts = $products_per_page * ($current_page - 1);

        $sql="select * from products where name like '%$search%' limit $products_per_page offset $skip_prodducts";

        $list_products = mysqli_query($conn, $sql);


    ?>
    <a href="./form-insert.php">Thêm sản phẩm</a>
    <!-- hien thi thong bao -->
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
            <th>Mã</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Ảnh</th>
            <th>Nhà sản xuất</th>
            <th>Chức năng</th>
        </tr>
        <?php foreach($list_products as $data){ ?>
            <tr>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo $data['description'] ?></td>
                <td><?php echo $data['price'] ?></td>
                <td><img src="../uploads/<?php echo $data['image'] ?>" height="100px" alt="image"></td>
                <td>
                    <?php 
                        $manufacturer_id = $data['manufacturer_id'];
                        $manufacturer_sql = "select * from manufacturers where id = '$manufacturer_id'";
                        $result = mysqli_query($conn, $manufacturer_sql);
                        $manufacturer = mysqli_fetch_array($result);

                        echo $manufacturer['name'];
                    ?>
                </td>
                <td><a href="./form-update.php?id=<?php echo $data['id']?>">Sửa</a>
                <a href="./delete-product.php?id=<?php echo $data['id']?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php for($i = 1; $i <= $page_total; $i++){?>
            <a href="./index.php?page=<?php echo $i ?>&search=<?php echo $search?>"><?php echo $i ?></a>
         <?php } ?>
</body>
</html>