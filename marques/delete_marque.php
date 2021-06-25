<?php 
include '../db.php';
if(!empty($_POST["marque_id"])){
    $id = $_POST["marque_id"];
    $query = mysqli_query($connection,"DELETE FROM marques WHERE marque_id = $marque_id");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "marques delete successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "marques not delete successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>