<?php
include '../db.php';
$response  = array();
$result = mysqli_query($connection,"SELECT *FROM categories");
$response["status"] = true;
$response["nbr"]= mysqli_num_rows($result);
$response["message"] = "All categories with details";
$response['categories'] = array();
while($row = mysqli_fetch_array($result)){
    $customerData['cat_id'] = $row['cat_id'];
    $customerData['cat_title'] = $row['cat_title'];
    $customerData['cat_image'] = $row['cat_image'];
    array_push( $response["categories"],$customerData );
}
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>