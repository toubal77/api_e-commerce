<?php 
include '../db.php';
if(!empty($_POST['user_id'])&&!empty($_POST['order_num'])){
    $user_id = $_POST["user_id"];
    $order_num = $_POST["order_num"];
    $confirmed = true;
    $query = mysqli_query($connection,"UPDATE orders SET confirmed = '$confirmed' WHERE user_id = '$user_id' AND order_num= '$order_num'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "order confirmed successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "order not confirmed successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>