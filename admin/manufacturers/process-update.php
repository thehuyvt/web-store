 <?php
    require '../connect.php';
    
    if(empty($_POST['id'])){
        header("Location:./index.php?error=Phải truyền mã id để sửa nsx");
    }

    $id = $_POST['id'];
    
    if(empty($_POST['name'])||empty($_POST['address'])
    ||empty($_POST['phone'])||empty($_POST['image'])){
        header("Location:./form-update.php?id=$id&error=Phải nhập đủ thông tin");
        exit;
    }

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $image = $_POST['image'];

    $sql = "Update manufacturers
    set
    name = '$name',
    address = '$address',
    phone = '$phone',
    image = '$image'
    where id = $id";

    $result = mysqli_query($conn, $sql);
    $error = mysqli_error($conn);
    mysqli_close($conn);
    if(empty($error)){
        header("Location:./index.php?success=Sửa nsx thành công");
    }else{
        header("Location:./form-update.php?id=$id&error=Lỗi truy vấn");
        exit;
    }
    