<?php 
include '../db.php';
if(!empty($_POST['cat_title']) && !empty($_POST['cat_image'])){
    $title = $_POST["cat_title"];
    $imageUrl = $_POST["cat_image"];
    $query = mysqli_query($connection,"INSERT INTO categories (cat_title,cat_image) VALUES($title,$imageUrl)");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "categories saved successfully";
    }else{
        $data["status"] = true;   
        $data["message"] = "categories not saved successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>