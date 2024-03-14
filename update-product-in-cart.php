<?php
    session_start();

    $id = $_GET['id'];
    if(!empty($_SESSION['cart'][$id])){
        $type = $_GET['type'];
        if($type == "delete"){
            unset($_SESSION['cart'][$id]);
        }else if($type == "decre"){
            if($_SESSION['cart'][$id]['quantity'] > 1){
                $_SESSION['cart'][$id]['quantity']--;
            }else{
                unset($_SESSION['cart'][$id]);
            }
        }else{
            $_SESSION['cart'][$id]['quantity']++;
        }
    }
    header("Location:./cart.php");