<?php 
    session_start();
    if(empty($_GET['id'])){
        header("Location:./index.php");
        exit;
    }else{
        $id = $_GET['id'];
        require '../connect.php';
        $sql = "select * from orders where id = '$id'";
        $result = mysqli_query($conn, $sql);
        $order_row = mysqli_num_rows($result);
        if($order_row != 1){
            header("Location:./index.php");
            exit;
        }
        $order = mysqli_fetch_array($result);

        $sql_product_in_order = "select p.id, p.name, p.price, p.image, op.quantity from order_product op inner join products p on op.product_id = p.id where op.order_id = '$id'";
        // die($sql_product_in_order);
        $list_products = mysqli_query($conn, $sql_product_in_order);
        $sum = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiet don hang</title>
</head>
<body>
    <h3>Chi tiết đơn hàng <?php echo $id ?></h3>
    <a href="./index.php">Trở lại</a>
    <table style="border: 1px solid #ddd; width: 100%; text-align: center;">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng</th>
        </tr>
        <?php foreach($list_products as $product){?>
                <tr>
                <td><?php echo $product['id'] ?></td>
                <td><?php echo $product['name'] ?></td>
                <td><img src="../uploads/<?php echo $product['image'] ?>" alt="anh" height="100px"></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['quantity'] ?></td>
                </tr>
        <?php 
            $sum += $product['price']*$product['quantity'];
        } ?>
    </table>

    <table style="text-align: left; width: 50%">
    <tr>
        <th>Thông tin đơn</th>
        <th>Thông tin khách hàng</th>
    </tr>
    <tr>
        <td>
            <p>Tổng giá trị: <?php echo $sum ?></p>
            <p>Triết khấu: <?php echo $sum - $order['total'] ?></p>
            <h4>Thanh toán: <?php echo $order['total'] ?></h4>
        </td>
        <td>
            <p>Tên người nhận: <?php echo $order['name_receiver'] ?></p>
            <p>Số điện thoại người nhận: <?php echo $order['phone_receiver'] ?></p>
            <p>Địa chỉ người nhận: <?php echo $order['address_receiver'] ?></p>
        </td>
    </tr>
    </table>  
</body>
</html>