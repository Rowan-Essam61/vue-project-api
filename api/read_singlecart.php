<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//initialize api
include_once('../core/initialize.php');
$Cart=new cart($db);

$Cart->id=isset($_GET['ID']) ? $_GET['ID'] : die();
$Cart->read_single();
$user_item=array(
            'id'=> $Cart->id,
            'username'=> $Cart->username,
            'productid' => $Cart->productid,
            'quantity'=>$Cart->quantity,
            'price'=>$Cart->price,
        );

        print_r(json_encode($user_item));
        ?>