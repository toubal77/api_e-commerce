<?php 
include '../db.php';

// le code marche


if(!empty($_POST["title"])){
    $title = $_POST["title"];

    $query = mysqli_query($connection,"DELETE FROM products WHERE product_name = '$title'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "products delete successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "products not delete successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
?>