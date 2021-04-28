<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-control-Allow-Method: POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-type,Access-Control-Allow-Method,Authorization, X-Requested-With ');
//initialize api
include_once('../core/initialize.php');
$Orders=new orders($db);
$data= json_decode(file_get_contents("php://input"));
$Orders->id = $data->ID;
$Orders->product_id = $data->Product_ID;
$Orders->total_price = $data->Total_Price;
$Orders->delivery_data = $data->Delivery_Data;
$Orders->order_date = $data->Order_Date;
$Orders->quantity = $data->Quantity;
$Orders->username = $data->Username;
$Orders->create();
?>