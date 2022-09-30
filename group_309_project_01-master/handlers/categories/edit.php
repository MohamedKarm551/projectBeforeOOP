<?php 

require_once '../../core/connection.php';
require_once '../../core/helper.php';

session_start();
// print_r($_POST);
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $des=$_POST['des'];
    // echo($id);
    // echo($name);
    // echo($des);die;

    $quer = mysqli_fetch_all(
        mysqli_query($conn,
        "SELECT * FROM `categories` WHERE categories.id=$id;"
    ));


// // print_r($quer);die;
// $query = "UPDATE `categories` SET `id`='$id',
//     `name`='$name',
//     `description`='$des' WHERE id='$id' ; ";

if($quer){ 
    // if category is already exist 
    $query = "UPDATE `categories` SET `id`='$id',
         `name`='$name',
         `description`='$des' WHERE id='$id' ;";
    $result = mysqli_query($conn, $query);

    if($result) {
        $_SESSION['success'] = "Category Deleted Successfully";
        header("Location: ../../pages/categories/index.php");
        exit;
    } else {
        header("Location: ../../pages/categories/index.php");
        exit;
    }

} 
else {
    header("Location: ../../pages/categories/index.php");
    exit;
}
}
else{
    echo "غير موجود";
}