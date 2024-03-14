<?php require './header.php';?>
<div id="main">
    <div class="content">
        <?php
            // session_start();
            if(!empty($_SESSION['cart'])){
                $list_products = $_SESSION['cart'];?>
                <table style="border: 1px; width: 100%; text-align: center;">
                <tr>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Số tiền</th>
                    <th>Thao tác</th>
                </tr>
                <?php $sum = 0;
                foreach($list_products as $id => $each){?>
                    <tr>
                        <td><img height="100px" src="admin/uploads/<?php echo $each['image']?>" alt="ảnh sản phẩm"></td>
                        <td><?php echo $each['name']?></td>
                        <td><?php echo $each['price']?></td>
                        <td>
                            <a class="button-option" href="update-product-in-cart.php?id=<?php echo $id ?>&type=decre">-</a>
                            <?php echo $each['quantity']?>
                            <a class="button-option" href="update-product-in-cart.php?id=<?php echo $id ?>&type=incre">+</a>
                        </td>
                        <td><?php $into_money = $each['price'] * $each['quantity'];
                                    echo ($into_money);
                                    $sum+=$into_money;
                        ?></td>
                        <td><a href="update-product-in-cart.php?id=<?php echo $id ?>&type=delete">Xóa</a></td>
                    </tr>
                <?php } ?>
        </table>
        <h2>Tổng số tiền: <?php echo $sum; ?></h2>
        <?php 
            if(!empty($_SESSION['id'])){
                $customer_id = $_SESSION['id'];
                $sql = "select * from customers where id = '$customer_id'";
                $result = mysqli_query($conn, $sql);
                $customer = mysqli_fetch_array($result);?>
            <form action="./process-checkout.php" method="post">
                Tên người nhận
                <input type="text" name="name_receiver" value="<?php echo $customer['name']?>">
                <br>
                Số điện thoại
                <input type="text" name="phone_receiver" value="<?php echo $customer['phone_number']?>">
                <br>
                Địa chỉ
                <input type="text" name="address_receiver" value="<?php echo $customer['address']?>">
                <br>
                <input type="submit" value="Đặt đơn hàng">
            </form>
        <?php }else{?>
            <p>Bạn cần <a href="./sign-in.php">Đăng nhập </a>để thanh toán!</p>
            <?php } ?>
        <?php }else{?>
                <h3 class="text-center">Giỏ hàng trống <a href="./index.php">Quay trở lại mua hàng</a></h3>
            <?php } ?>
    </div>
</div></div>
<?php require './footer.php';?>