<?php
    if(empty($_POST['name_receiver'])
    ||empty($_POST['phone_receiver'])
    ||empty($_POST['address_receiver'])){
        header("Location:./cart.php?error=You must fill all information!");
        exit;
    }else{
        $name_receiver = $_POST['name_receiver'];
        $phone_receiver = $_POST['phone_receiver'];
        $address_receiver = $_POST['address_receiver'];

        session_start();
        $cart = $_SESSION['cart'];
        $customer_id = $_SESSION['id'];
        $total = 0;
        foreach($cart as $each){
            $total += $each['price'] * $each['quantity'];
        }
        $status = 0; //Chưa xử lý
        require 'admin/connect.php';
        $sql_orders = "insert into orders(customer_id, name_receiver, phone_receiver, address_receiver, total, status)
        values ('$customer_id', '$name_receiver', '$phone_receiver', '$address_receiver', '$total', '$status')";
        mysqli_query($conn, $sql_orders);
        $sql_get_order_id = "Select max(id) as id from orders where customer_id ='$customer_id'";

        $order = mysqli_fetch_array(mysqli_query($conn, $sql_get_order_id));
        $order_id = $order['id'];

        // foreach($cart as $product_id => $each){echo $product_id ."<br></br>";};

        foreach($cart as $product_id => $each){
            echo($product_id);
            $quantity = $each['quantity'];
            $sql_order_product = "insert into order_product(order_id, product_id, quantity) values ('$order_id', '$product_id', '$quantity')";
            mysqli_query($conn, $sql_order_product);
        }
        unset($_SESSION['cart']);        
        header("Location:./index.php?success=Đặt hàng thành công");
        mysqli_close($conn);
    }   