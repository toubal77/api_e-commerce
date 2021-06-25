<?php 
include './db.php';
if(!empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_prepare($connection,"SELECT * FROM customer WHERE email = $'$email'");
    if(mysqli_num_rows($query) == 0){
        $data['status'] = false;
        $data['message'] = 'email not existe';
    }else{
        $data['customer'] = array();
        while($row = mysqli_fetch_array($query)){
            $customerData['customer_id'] = $row['id'];
            $customerData['customer_first_name'] = $row['First_name'];
            $customerData['customer_last_name'] = $row['Last_name'];
            $customerData['customer_dob'] = $row['DOB'];
            $customerData['customer_email'] = $row['email'];
            $customerData['customer_password'] = $row['password'];
            $customerData['customer_address'] = $row['Address'];
            $customerData['customer_phone'] = $row['MobNo'];
            $customerData['customer_gender'] = $row['Gender'];
            $customerData['customer_accstatus'] = $row['accstatus'];
            if($password != $customerData['customer_password']){
                $data['status'] = false;
                $data['message'] = 'password not correct';
            }
            if($customerData['customer_accstatus'] == 'ACTIVE'){
                $data['status'] = true;
                array_push( $data['customer'],$customerData );
            }else{
                $data['status'] = false;
                $data['message'] = 'your account is inactive contact support DEBBAH BANK';
                array_push($data['customer'],$customerData);
            }
        }
    }
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
}
?>