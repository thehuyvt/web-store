<?php require './header.php';?>
<div id="main">
    <div class="content">
        <?php
            // session_start();
            if(!empty($_SESSION['cart'])){
                $list_products = $_SESSION['cart'];?>
                <table class="table-cart" style="border: 1px; width: 100%; text-align: center; margin: 24px 0;">
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
                        <td><span class="product-cart-name"><?php echo $each['name']?></span></td>
                        <td><span class="product-cart-price"><?php echo $each['price']?></span></td>
                        <td>
                            <!-- <a class="button-option" href="update-product-in-cart.php?id=<?php echo $id ?>&type=decre">-</a> -->
                            <button class="btn-cart-option" data-id="<?php echo $id ?>" data-type="decre">
                                -
                            </button>
                            <span class="product-cart-quantity">
                            <?php echo $each['quantity']?>
                            </span>
                            <!-- <a class="button-option" href="update-product-in-cart.php?id=<?php echo $id ?>&type=incre">+</a> -->
                            <button class="btn-cart-option" data-id="<?php echo $id ?>" data-type="incre">
                                +
                            </button>
                        </td>
                        <td><span class="product-cart-sum">
                        <?php $into_money = $each['price'] * $each['quantity'];
                                    echo ($into_money);
                                    $sum+=$into_money;
                            ?>
                        </span>
                        </td>
                        <td>
                            <!-- <a href="update-product-in-cart.php?id=<?php echo $id ?>&type=delete">Xóa</a> -->
                            <button class="btn-cart-option"  data-id="<?php echo $id ?>" data-type="delete">Xóa</button>
                        </td>
                    </tr>
                <?php } ?>
        </table>
        <div class="cart-infor">
            <h2>Tổng số tiền: <span id="cart-total"><?php echo $sum; ?></span></h2>
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
    </div>
</div></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $(".btn-cart-option").click(function(){
            let btn = $(this);
            let id = btn.data('id');
            let type = btn.data('type');

            $.ajax({
                url:"update-product-in-cart.php",
                type: "GET",
                data: {id, type}
            })

            .done(function(data){
                let parent_tr = btn.parents('tr');
                let price = parent_tr.find('.product-cart-price').text();
                let quantity = parent_tr.find('.product-cart-quantity').text();
                let cart_empty = `<h3 class="text-center">Giỏ hàng trống <a href="./index.php">Quay trở lại mua hàng</a></h3>`;
                if(type == "incre"){
                    quantity++;
                    parent_tr.find('.product-cart-quantity').text(quantity);
                    parent_tr.find('.product-cart-sum').text(quantity * price);
                }else if(type == "decre"){
                    quantity--;
                    if(quantity == 0){
                        parent_tr.remove();
                        if($('.table-cart').find("tr").length === 1){
                            // $(this).remove();
                            $('.table-cart').remove();
                            $(".cart-infor").remove();
                            $(".content").append(cart_empty);
                        }
                    }else{
                        parent_tr.find('.product-cart-quantity').text(quantity);
                        parent_tr.find('.product-cart-sum').text(quantity * price);
                    }
                }else if(type == "delete"){
                    parent_tr.remove();
                    if($('.table-cart').find("tr").length === 1){
                            // $(this).remove();
                            $('.table-cart').remove();
                            $(".cart-infor").remove();
                            $(".content").append(cart_empty);
                        }
                }

                let total = 0;
                $('.product-cart-sum').each(function(){
                    total += parseFloat($(this).text());
                })

                $('#cart-total').text(total);
                    console.log("success");
                })
        })
    });
</script>
<?php require './footer.php';?>