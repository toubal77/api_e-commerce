<?php 
include '../db.php';

if(!empty($_POST['user_id']) && !empty($_POST['username']) && !empty($_POST['user_email']) && !empty($_POST['user_password']) && !empty($_POST['user_phone']) && !empty($_POST['user_adresse']) && !empty($_POST['status_admin'])){
    $id= $_POST["user_id"];
    $username = $_POST["username"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];
    $user_phone = $_POST["user_phone"];
    $user_adresse = $_POST["user_adresse"];
    $status_admin = $_POST["status_admin"];
    $query = mysqli_query($connection,"UPDATE users SET username = '$username',user_email = '$user_email',user_phone = '$user_phone',user_adresse = '$user_adresse',status_admin = '$status_admin' WHERE user_id = '$id'");
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