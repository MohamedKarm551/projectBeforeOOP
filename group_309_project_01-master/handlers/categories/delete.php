<?php 

require_once '../../core/connection.php';
require_once '../../core/helper.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {

    $id = $_GET['id'];

    // check here if category is already exist or not (task)
$quer = mysqli_fetch_all(
    mysqli_query($conn,
    "SELECT * FROM `categories` WHERE categories.id=$id;"
));

// print_r($quer);die;
if($quer){ 
    // if category is already exist 
    $query = "DELETE FROM `categories` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);

    if($result) {
        $_SESSION['success'] = "Category Deleted Successfully";
        header("Location: ../../pages/categories/index.php");
        exit;
    } else {
        header("Location: ../../pages/categories/index.php");
        exit;
    }

} else {
    header("Location: ../../pages/categories/index.php");
    exit;
}
}
else{
    echo "غير موجود";
}
