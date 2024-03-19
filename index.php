
<?php require './header.php';
    // require 'admin/connect.php';
?>
    <div id="main">
        <div class="content">
            <?php if(!empty($_SESSION['name'])) {echo "Xin chào " . $_SESSION['name']; } ?>
            <div class="section">
                <h3 class="title-section">Sản phẩm mới nhất</h3>
                <div class="list-products">
                    <?php
                        $sql_list_product = "select * from products";
                        $list_products = mysqli_query($conn, $sql_list_product);
                        
                        foreach($list_products as $product){
                    ?>
                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="admin/uploads/<?php echo $product['image'] ?>" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name"><?php echo $product['name'] ?></h4>
                                <p class="product-price"><?php echo $product['price'] ?></p>
                                <a href="./detail-product.php?id=<?php echo $product['id']?>">Chi tiết</a>
                                <br>
                                <button class="btn-add-to-cart" data-id="<?php echo $product['id']?>">
                                    Thêm vào giỏ hàng
                                </button>
                                <!-- <a href="./add-to-card.php?id=<?php echo $product['id']?>">Thêm vào giỏ hàng</a> -->
                                <br>
                                <span class="product-manufacturer"><?php 
                                    $manufacturer_id = $product['manufacturer_id'];
                                    $sql_manufacturer = "select name from manufacturers where id = '$manufacturer_id'";
                                    // die($sql_manufacturer);
                                    $result_manufacturer = mysqli_query($conn, $sql_manufacturer);
                                    $manufacturer = mysqli_fetch_array($result_manufacturer);
                                    echo $manufacturer['name'];
                                ?></span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <a href="#" class="see-more">Xem thêm</a>
            <!-- <div class="section">
                <h3 class="title-section">Sản phẩm bán chạy nhất</h3>
                <div class="list-products">
                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                                <a href="">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="see-more">Xem thêm</a>
            </div> -->
        </div>
    </div></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $(".btn-add-to-cart").click(function(){
            let id = $(this).data('id');

            $.ajax({
            url: 'add-to-card.php',
            type: 'GET',
            // dataType:'',
            data: {id},
            })
            .done(function(data){
                if(data == 1){
                    alert('Thêm sản phẩm vào giỏ hàng thành công');
                }else{
                    alert(data);
                }
            })
            .fail(function(){
                console.log("fail");
            })
        });

        
    });
</script>
<?php require './footer.php'; ?>
