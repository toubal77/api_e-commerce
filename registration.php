<?php
include './db.php';
if(!empty($_POST['username']) && !empty($_POST['user_email']) && !empty($_POST['user_password']) && !empty($_POST['user_phone']) && !empty($_POST['user_adresse'])){
        $username = $_POST["username"];
        $user_email = $_POST["user_email"];
        $user_password = $_POST["user_password"];
        $user_phone = $_POST["user_phone"];
        $user_adresse = $_POST["user_adresse"];
        $status_admin = false;
        $response = array();
        $result = mysqli_query($connection, "SELECT * FROM users WHERE user_email = '$user_email'");
        if(mysqli_num_rows($result)!=0){
            $response["status"] = false;
            $response["message"] = "Email existe let log in";
        }else{
            $query = mysqli_query($connection,"INSERT INTO users (username,user_email,user_password,user_phone,user_adresse,status_admin) VALUES($username,$user_email,$user_password,$user_phone,$user_adresse,$status_admin)");
            if($query == 1){
                $data["status"] = true;
                $data["message"] = "user saved successfully";
            }else{
                $data["status"] = false;   
                $data["message"] = "user not saved successfully"; 
            }
        }
    }else{
        $response["status"] = false; 
        $response["message"] = "Format not supported";   
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
?>