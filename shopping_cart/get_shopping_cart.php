<?php 
include '../db.php';
if(!empty($_POST['user_id'])){
    $user_id = $_POST["user_id"];

    $data["status"] = true; 
    $data["message"] = "get shopping cart";
    $data["cart"] = array();   
    $total = 0;
    $query = mysqli_prepare($connection,"SELECT * FROM shopping_cart, product WHERE shopping_cart.user_id = '$user_id' AND product.product_.id = shopping_cart.product_id");
    while($row = mysqli_fetch_array($query)){
        $cart()
    }
    // $query = mysqli_query($connection,"SELECT * FROM shopping_cart WHERE user_id = '$user_id'");
    // while($row = mysqli_fetch_array($query)){
    //     $product_id = $row['product_id'];
    //     $qty = $row['qty'];
    //     $result = mysqli_query($connection,"SELECT * FROM product WHERE product_id = '$product_id'");
    //     $row_prod = mysqli_fetch_array($result);
    //     $product_name = $row_prod['product_name'];
    //     $product_price = $row_prod['product_price'];
    //     $subTotal = $product_price * $qty;

    //     $cart['product_name'] = $product_name;
    //     $cart['product_price'] = $product_price;
    //     $cart['qty'] = $qty;
    //     $cart['subTotal'] = $subTotal;
    //     $total = $total +$subTotal;
    //     array_push($data["cart"],$cart);
    // }
    // $data["total"] = $total;
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
?>