<?php
    session_start();
    if(empty($_SESSION['admin_id'])){
        header("Location:../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<body>
    <?php require '../menu.php'; ?>
    <h3>Danh sách đơn hàng</h3>
    <table style="width:100%; text-align: center;">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên người nhận</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Giá trị đơn</th>
            <th>Thời gian đặt</th>
            <th>Trạng thái</th>
            <th>Chức năng</th>
        </tr>
        <?php 
            require '../connect.php';
            $sql_list_orders = "select * from orders order by id desc";
            $list_orders = mysqli_query($conn, $sql_list_orders);
            foreach($list_orders as $order){
        ?>
            <tr>
                <td><?php echo $order['id'] ?></td>
                <td><?php echo $order['name_receiver'] ?></td>
                <td><?php echo $order['phone_receiver'] ?></td>
                <td><?php echo $order['address_receiver'] ?></td>
                <td><?php echo $order['total'] ?></td>
                <td><?php echo $order['create_time'] ?></td>
                <td><?php 
                if($order['status'] == 0) {
                    echo "Đã hủy";
                }else if($order['status'] == 1){
                    echo "Chưa xác nhận";
                }else if($order['status'] == 2){
                    echo "Đã xác nhận";
                }
                ?></td>
                <td>
                    <a href="./order-detail.php?id=<?php echo $order['id'] ?>"><i class="fa-solid fa-circle-info"></i></a>
                    <?php 
                    if($order['status'] == 1){?>
                        <a href="./update-status-order.php?id=<?php echo $order['id'] ?>&type=access"><i class="fa-solid fa-circle-check"></i> </a>
                        <a href="./update-status-order.php?id=<?php echo $order['id'] ?>&type=cancel"><i class="fa-solid fa-ban"></i></a>
                    <?php }else if($order['status'] == 2){?>
                        <a href="./update-status-order.php?id=<?php echo $order['id'] ?>&type=cancel"><i class="fa-solid fa-ban"></i></a>
                   <?php } ?>
                </td>
            </tr>
        <?php }?>
    </table>
</body>
</html>
