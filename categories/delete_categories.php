<?php 
include '../db.php';
if(!empty($_POST["cat_id"])){
    $id = $_POST["cat_id"];
    $query = mysqli_query($connection,"DELETE FROM categories WHERE cat_id = '$id'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "categories delete successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "categories not delete successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>