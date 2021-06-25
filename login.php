<?php
include './db.php';
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $response = array();
        $result = mysqli_query($connection, "SELECT * FROM users WHERE user_email = '$email'");
        if(mysqli_num_rows($result)==0){
            $response["status"] = false;
            $response["message"] = "Email don'\t existe";
        }
        $row = mysqli_fetch_array($result);
        $customerData = $row['user_password'];
        if($customerData==$password){
            $response["status"] = true;
            $response["message"] = "All good";
        }else{
            $response["status"] = false;
            $response["message"] = "Pasword incorrect";
        }
    }else{
        $response["status"] = false; 
        $response["message"] = "Format not supported";   
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
?>