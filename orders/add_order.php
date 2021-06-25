<?php 
include '../db.php';
if(!empty($_POST['user_id']) && !empty($_POST['order_num']) && !empty($_POST['order_date'])){
    $user_id = $_POST["user_id"];
    $order_num = $_POST["order_num"];
    $order_date = $_POST["order_date"];
    $order_amount = 0;
    $confirmed = '0';
    $order = mysqli_query($connection,"INSERT INTO orders (user_id,order_num,order_date,order_amount,confirmed) VALUES('$user_id','$order_num','$order_date','$order_amount','$confirmed')");
    $data["msg1"] = 'dakhalt date w num ta3 order';
    $get_order =mysqli_query($connection,"SELECT * FROM orders WHERE order_num = '$order_num'");
    $data["msg2"] = 'jabt id ta3 order';
    $row_order = mysqli_fetch_array($result);
    $order_id = $row_order['order_id'];

    $get_product = mysqli_query($connection,"SELECT * FROM shopping_cart WHERE user_id = '$user_id'");
    if($get_product == 1){
        $data["mes3"] = "jabt user_id m shopping cart";
    }else{ 
        $data["mes3"] = "majabch user_id m shopping cart " + mysqli_error($connection); 
    }
    while($row_prod = mysqli_fetch_array($get_product)){
        $data["msg4"] = 'produit m  cart';
        $product_id = $row_prod['product_id'];
        $qty = $row_prod['qty'];
        $result = mysqli_query($connection,"SELECT * FROM product WHERE product_id = '$product_id'");
        if($result == 1){
            $data["mes5"] = "jabt product_id m product";
        }else{ 
            $data["mes5"] = "majabch product_id m product "+ mysqli_error($connection); 
        }
        while($row = mysqli_fetch_array($result)){
            $product_price = $row['product_price'];
            $subTotal = $product_price * $qty;
        }
        $query = mysqli_query($connection,"INSERT INTO order_details (product_id,product_qty,product_price,order_id,subTotal) VALUES('$product_id','$qty','$product_price','$order_id','$subTotal')");
        if($result == 1){
            $data["msg6"] = 'ndakhal f order details les odnnes';
        }else{ 
            $data["mes6"] = "majabch f order details les odnnes "+ mysqli_error($connection); 
        }
        
    }
    $total =0;
    $get_amount = mysqli_query($connection,"SELECT * FROM order_details WHERE order_id = '$order_id'");
    if($get_amount == 1){
        $data["mes7"] = "jabt order_id m order_details";
    }else{ 
        $data["mes7"] = "majabch order_id m order_details "+ mysqli_error($connection); 
    }
    while($row_amount = mysqli_fetch_array($get_amount)){
        $subTotal = $row_prod['subTotal'];
        $total = $total + $subTotal;
        $data["msg8"] = 'hsabt total ta3 les prix';
    }
    mysqli_query($connection,"INSERT INTO orders (order_amount) VALUES('$total')");

    $query = mysqli_query($connection,"DELETE FROM shopping_cart WHERE user_id = '$user_id'");
    if($query == 1){
        $data["status"] = true;
        $data["message"] = "order saved successfully";
    }else{
        $data["status"] = false;   
        $data["message"] = "order not saved successfully"; 
    }
}else{
    $data["status"] = false; 
    $data["message"] = "Format not supported";   
}
header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
?>