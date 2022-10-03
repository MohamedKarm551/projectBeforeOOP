<?php 

require_once '../../core/connection.php';
require_once '../../core/helper.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {

    $id = $_GET['id'];

    // check here if category is already exist or not (task)
$quer = mysqli_fetch_all(
    mysqli_query($conn,
    "SELECT * FROM `products` WHERE products.id=$id;"
));

// print_r($quer);die;
if($quer){ 
    // if category is already exist 

    $query = "DELETE FROM `products` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);

    if($result) {
        $_SESSION['success'] = "products Deleted Successfully";
        header("Location: ../../pages/products/index.php");
        exit;
    } else {
        header("Location: ../../pages/products/index.php");
        exit;
    }

} else {
    header("Location: ../../pages/products/index.php");
    exit;
}
}
else{
    echo "غير موجود";
}
