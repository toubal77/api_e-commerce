<?php 
include '../db.php';
if(!empty($_POST['marque_title']) && !empty($_POST['marque_image'])&& !empty($_POST['marque_id'])){
    $marque_title = $_POST["marque_title"];
    $imageUrl = $_POST["imageUrl"];
    $id = $_POST["marque_id"];
    $query = mysqli_query($connection,"UPDATE marques SET marque_title = '$marque_title',marque_image = '$marque_image' WHERE marque_id = '$id'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "marque update successfully";
    }else{
        $data["status"] = true;   
        $data["message"] = "marque not update successfully"; 
    }
}else{
    $data["status"] = true; 
    $data["message"] = "Format not supported";   
}
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>