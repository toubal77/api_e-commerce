<?php 
include '../db.php';

if(!empty($_POST['username']) && !empty($_POST['user_email']) && !empty($_POST['user_password']) && !empty($_POST['user_phone']) && !empty($_POST['user_adresse'])){
    $username = $_POST["username"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];
    $user_phone = $_POST["user_phone"];
    $user_adresse = $_POST["user_adresse"];
    $status_admin = false;
    $query = mysqli_query($connection,"INSERT INTO users (username,user_email,user_password,user_phone,user_adresse,status_admin) VALUES('$username','$user_email','$user_password','$user_phone','$user_adresse','$status_admin')");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "user saved successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "user not saved successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
?>