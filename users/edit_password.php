<?php 
include '../db.php';
if(!empty($_POST["user_id"]) && !empty($_POST["user_password"])){
    $id = $_POST["user_id"];
    $user_password = $_REQUEST["user_password"];
    $query = mysqli_query($connection,"UPDATE users SET user_password = '$user_password' WHERE user_id = '$id'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "passsword user update successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "password user not update successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
?>