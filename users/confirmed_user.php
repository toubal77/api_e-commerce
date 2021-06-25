<?php 
include '../db.php';

if(!empty($_POST['user_id']) && !empty($_POST['status_admin'])){
    $id= $_POST["user_id"];
    $status_admin = $_POST["status_admin"];
    if($status_admin == false){
        $admin = true;
    }else{
        $admin = false;
    }
    $query = mysqli_query($connection,"UPDATE users SET status_admin = '$admin' WHERE user_id = '$id'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "user update successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "user not update successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);

?>