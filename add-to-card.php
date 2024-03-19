<?php
try {
    session_start();
    // unset($_SESSION['cart']);
    if(empty($_GET['id'])){
        throw new Exception("không tồn tại id");
        
    }else{
        $product_id = $_GET['id'];

        require 'admin/connect.php';

        $sql = "select * from products where id = '$product_id'";
        $result = mysqli_query($conn, $sql);
        $count_product = mysqli_num_rows($result);
        //print_r($count_product);
        $product = mysqli_fetch_array($result);

        if($count_product !== 1){
            header("Location:./error-404.php");
            exit;
        }else{
            if(empty($_SESSION['cart'][$product_id])){  
                $_SESSION['cart'][$product_id]['name'] = $product['name'];  
                $_SESSION['cart'][$product_id]['image'] = $product['image'];   
                $_SESSION['cart'][$product_id]['price'] = $product['price'];    
                $_SESSION['cart'][$product_id]['quantity'] = 1;
            }else{
                $_SESSION['cart'][$product_id]['quantity']++;
            }
            // header("Location:./index.php");
        }
    }
    echo 1;
} catch (\Throwable $e) {
    echo $e->getMessage();
}
     