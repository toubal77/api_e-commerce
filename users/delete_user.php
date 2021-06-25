<?php 
include '../db.php';
if(!empty($_POST["user_id"])){
    $id = $_POST["user_id"];

    $query = mysqli_query($connection,"DELETE FROM users WHERE user_id = '$id'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "user delete successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "user not delete successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
?>