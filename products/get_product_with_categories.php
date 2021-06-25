<?php
include '../db.php';


// le code marche


if(!empty($_POST['categories'])){
        $response  = array();
        $categorie =  $_POST['categories'];
        $result = mysqli_query($connection,"SELECT * FROM products WHERE product_categorie = '$categorie'");
        $response["status"] = true;
        $response["nbr"]= mysqli_num_rows($result);
        $response["message"] = "All products with categories";
        $response['products'] = array();

        while($row = mysqli_fetch_array($result)){ 
            $customerData['id'] = $row['product_id'];
            $customerData['title'] = $row['product_name'];
            $customerData['description'] = $row['product_desc'];
            $customerData['imageUrl'] = $row['product_image'];
            $customerData['categories'] = $row['product_categorie'];
            $customerData['marques'] = $row['product_marque'];
            $customerData['price'] = $row['product_price'];
            $customerData['stock'] = $row['product_stock'];
            array_push( $response["products"],$customerData );
        }    
    }else{
        $data["status"] = false; 
        $data["message"] = "Format not supported";  
        $response['products'] = array(); 
    }
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>
