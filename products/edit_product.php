<?php 
include '../db.php';

// le code marche

if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['imageUrl']) && !empty($_POST['categories']) && !empty($_POST['marques']) && !empty($_POST['price']) && !empty($_POST['stock'])){
    $title = $_POST["title"];
    $description = $_POST["description"];
    $imageUrl = $_POST["imageUrl"];
    $categories = $_POST["categories"];
    $marques = $_POST["marques"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $query = mysqli_query($connection,"UPDATE products SET product_name = '$title',product_desc= '$description',product_image = '$imageUrl',product_categorie = '$categories',product_marque = '$marques', product_price = '$price',product_stock = '$stock' WHERE product_name = '$title'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "product update successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "product not update successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>