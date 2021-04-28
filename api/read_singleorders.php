<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initialize api
include_once('../core/initialize.php');
$Order=new orders($db);

$Order->id=isset($_GET['ID']) ? $_GET['ID'] : die();
$Order->read_single();
$user_item=array(
                     'id'=> $ID,
            'product_id'=> $Product_ID,
            'total_price' => $Total_Price,
            'delivery_data'=> $Delivery_Data,
           'order_date' =>$Order_Date,
            'quantity' => $Quantity,
           'username'=> $Username
        );

        print_r(json_encode($user_item));
        ?>