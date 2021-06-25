<?php 
include '../db.php';
if(!empty($_POST['marque_title']) && !empty($_POST['marque_image'])){
    $title = $_POST["marque_title"];
    $imageUrl = $_POST["marque_image"];
    $query = mysqli_query($connection,"INSERT INTO marques (marque_title,marque_image) VALUES('$title','$imageUrl')");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "marque saved successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "marque not saved successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>