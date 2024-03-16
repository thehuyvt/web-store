<?php
    session_start();
    if(empty($_SESSION['admin_id'])){
        header("Location:../index.php");
        exit;
    }
    require '../connect.php';
    $order_id = $_GET['id'];
    $type = $_GET['type'];

    $sql = "select * from orders where id = '$order_id'";
    $result = mysqli_query($conn, $sql);
    $order_row = mysqli_num_rows($result);

    if($order_row != 1){
        header("Location:./index.php");
        exit;
    }

    if($type == "access"){
        $sql_update = "update orders set status = '2' where id = '$order_id'";
        mysqli_query($conn, $sql_update);
        header("Location:./index.php");
        exit;
    }else if($type == "cancel"){
        $sql_update = "update orders set status = '0' where id = '$order_id'";
        mysqli_query($conn, $sql_update);
        header("Location:./index.php");
        exit;
    }else{
        header("Location:./index.php");
        exit;
    }

    mysqli_close($conn);