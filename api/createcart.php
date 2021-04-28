<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-control-Allow-Method: POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-type,Access-Control-Allow-Method,Authorization, X-Requested-With ');
//initialize api
include_once('../core/initialize.php');
$Cart=new cart($db);
$data= json_decode(file_get_contents("php://input"));
$Cart->id = $data->ID;
$Cart->username = $data->Username;
$Cart->productid = $data->Product_id;
$Cart->quantity = $data->quantity;
$Cart->price = $data->price;

$Cart->create();
?>