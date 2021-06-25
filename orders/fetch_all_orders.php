<?php
include '../db.php';

    $query = mysqli_query($connection,"SELECT * FROM orders");
    $response["status"] = true;
    $response["nbr"]= mysqli_num_rows($query);
    $response["message"] = "fetch order user";
    $response['orders'] = array();
    while($row = mysqli_fetch_array($query)){
        $customerData['order_id'] = $row['order_id'];
        $customerData['user_id'] = $row['user_id'];
        $customerData['order_num'] = $row['order_num'];
        $customerData['order_date'] = $row['order_date'];
        $customerData['order_amount'] = $row['order_amount'];
        $customerData['confirmed'] = $row['confirmed'];
        $order_id = $customerData['order_id'];
        $user_id = $customerData['user_id'];
        $get_order = mysqli_query($connection,"SELECT * FROM order_details WHERE order_id = '$order_id'");
        $response['orders']["nbr"]= mysqli_num_rows($get_order);
        $response['orders']['order_detail'] = array();
        while($row_order = mysqli_fetch_array($get_order)){
            $orderData['order_dtl_id'] = $row_order['order_dtl_id'];
            $product_id  = $row_order['product_id'];
            $orderData['product_qty'] = $row_order['product_qty'];
            $orderData['product_price'] = $row_order['product_price'];
            $orderData['order_id'] = $row_order['order_id'];
            $orderData['subTotal'] = $row_order['subTotal'];
            $result = mysqli_query($connection,"SELECT *FROM products WHERE product_id = '$product_id'");
            $row = mysqli_fetch_array($result);
            $orderData['product_name'] = $row['product_name'];
            array_push($response['orders']['order_detail'],$orderData );
        }
        array_push($response['orders'],$response['orders']['order_detail']  );
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);

// include '../db.php';
// $query = mysqli_query($connection,"SELECT * FROM orders");
// $response["status"] = true;
// $response["nbr"]= mysqli_num_rows($query);
// $response["message"] = "All orders with details";
// $response['orders'] = array();
// while($row = mysqli_fetch_array($result)){
//     $customerData['id'] = $row['id'];
//     $customerData['username'] = $row['username'];
//     $customerData['email'] = $row['email'];
//     $customerData['phone'] = $row['phone'];
//     $customerData['adresse'] = $row['adresse'];
//     $customerData['dateTime'] = $row['dateTime'];
//     $customerData['amount'] = $row['amount'];
//     $customerData['confirmed'] = $row['confirmed'];
//     $customerData['products'] = $row['products'];
//   array_push( $response["orders"],$customerData );
// }
// header('Content-Type: application/json');
// echo json_encode($response, JSON_PRETTY_PRINT);
?>