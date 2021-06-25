<?php 
include '../db.php';

if(!empty($_POST["user_id"]) && !empty($_POST["product_id"])){
    $user_id = $_POST["user_id"];
    $product_id = $_POST["product_id"];

    $query = mysqli_query($connection,"DELETE FROM shopping_cart WHERE user_id = '$user_id' AND product_id = '$product_id'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "shopping cart delete product successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "shopping cart not delete product successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
?>