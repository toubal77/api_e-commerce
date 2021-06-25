<?php 
include '../db.php';
if(!empty($_POST['user_id']) && !empty($_POST['product_id']) && !empty($_POST['qty'])){
    $user_id = $_POST["user_id"];
    $product_id = $_POST["product_id"];
    $qty = $_POST["qty"];

    $shop = mysqli_query($connection,"SELECT * FROM shopping_cart WHERE user_id = '$user_id' AND product_id = '$product_id'");
    if(mysqli_num_rows($shop) == 1){
        $row_qty = mysqli_fetch_array($shop);
        $qty_ancien = $row_qty['qty'];
        $qty = $qty + $qty_ancien;
        $add_shop = mysqli_query($connection,"UPDATE  shopping_cart SET qty = '$qty'  WHERE user_id = '$user_id' AND product_id = '$product_id'");
        if($add_shop == 1){
            $data["status"] = true;
            $data["message"] = "shopping cart update quantity";
        }else{
            $data["status"] = false;   
            $data["message"] = "shopping cart not update quantity"; 
        }
    }else{
        $query = mysqli_query($connection,"INSERT INTO shopping_cart (user_id,product_id,qty) VALUES('$user_id','$product_id','$qty')");
        if($query == 1){
            $data["status"] = true;
            $data["message"] = "shopping cart add successfully";
        }else{
            $data["status"] = false;   
            $data["message"] = "shopping cart not add successfully"; 
        }
    }

}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);

?>