<?php
    session_start();
    $check_session = empty($_SESSION['id']);
    // if($check_session){
    //     header('Location:./index.php');
    //     exit;
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thế giới điện thoại</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div id="header">
        <a href="" class="header-logo"><img src="https://static.vecteezy.com/system/resources/previews/003/092/544/original/e-commerce-logo-with-pointer-and-shopping-bag-free-vector.jpg" alt="logo"></a>
        <ul class="header-nav">
            <li><a href="">Trang chủ</a></li>
            <li><a href="">Sản phẩm</a></li>
            <li><a href="">Giỏ hàng</a></li>
            <?php if($check_session){?>
                    <li><a href="./sign-in.php">Đăng nhập</a></li>
                    <li><a href="./sign-up.php">Đăng kí</a></li>
            <?php }else{?>
                    <li><a href="./sign-out.php">Đăng xuất</a></li>
            <?php } ?>
            
        </ul>
    </div>
    <div id="main">
        <div class="content">
            <div class="section">
                <h3 class="title-section">Sản phẩm mới nhất</h3>
                <div class="list-products">
                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>
                    
                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="#" class="see-more">Xem thêm</a>
            </div>
            <div class="section">
                <h3 class="title-section">Sản phẩm bán chạy nhất</h3>
                <div class="list-products">
                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>
                    
                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>
                    
                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>

                    <div class="product">
                        <a href="#" class="product-card">
                            <div class="product-card-img">
                                <img src="https://salt.tikicdn.com/cache/750x750/ts/product/99/86/04/0dc97405d243042a84b2c96768fe0e38.png.webp" alt="image product" class="product-img">
                            </div>
                            <div class="product-card-content">
                                <h4 class="product-name">Iphone 15 Promax 1TB chính hãng</h4>
                                <p class="product-price">123000đ</p>
                                <span class="product-manufacturer">Apple</span>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="#" class="see-more">Xem thêm</a>
            </div>
        </div>
    </div>
    <div id="footer">
        <ul class="list-socials">
            <li class="social-item"><a href=""><i class="fa-brands fa-square-facebook"></i></a></li>
            <li class="social-item"><a href=""><i class="fa-brands fa-tiktok"></i></a></li>
            <li class="social-item"><a href=""><i class="fa-brands fa-instagram"></i></a></li>
            <li class="social-item"><a href=""><i class="fa-brands fa-square-twitter"></i></a></li>
            <li class="social-item"><a href=""><i class="fa-brands fa-square-threads"></i></a></li>
        </ul>
        
        <span class="footer-title">Copyright © The Huy Pham.</span>
    </div>
</body>
</html>