<?php
include '../db.php';
$response  = array();
$result = mysqli_query($connection,"SELECT *FROM marques");
$response["status"] = true;
$response["nbr"]= mysqli_num_rows($result);
$response["message"] = "All marques with details";
$response['marques'] = array();
while($row = mysqli_fetch_array($result)){
    $customerData['marque_id'] = $row['marque_id'];
    $customerData['marque_title'] = $row['marque_title'];
    $customerData['marque_image'] = $row['marque_image'];
    array_push( $response["marques"],$customerData );
}
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>