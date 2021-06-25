<?php 
include '../db.php';
if(!empty($_POST['cat_title']) && !empty($_POST['cat_image'])&& !empty($_POST['cat_id'])){
    $title = $_POST["cat_title"];
    $imageUrl = $_POST["cat_image"];
    $id = $_POST["cat_id"];
    $query = mysqli_query($connection,"UPDATE categories SET cat_title = '$title',cat_image = '$imageUrl' WHERE cat_id = '$id'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "categories update successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "categories not update successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>