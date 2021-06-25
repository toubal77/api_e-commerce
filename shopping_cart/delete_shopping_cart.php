<?php 
include '../db.php';

if(!empty($_POST["user_id"])){
    $user_id = $_POST["user_id"];

    $query = mysqli_query($connection,"DELETE FROM shopping_cart WHERE user_id = '$user_id'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "shopping cart delete successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "shopping cart not delete successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
?>