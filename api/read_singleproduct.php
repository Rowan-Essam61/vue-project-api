<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initialize api
include_once('../core/initialize.php');
$Product=new product($db);

$Product->id=isset($_GET['ID']) ? $_GET['ID'] : die();
$Product->read_single();
$product_item=array(
            'id'=> $Product->id,
            'category_id'=> $Product->category_id,
            'color' => $Product->color,
            'size'=>$Product-> size,
           'description' =>$Product->description,
            'price' => $Product->price,
           'name'=> $Product->name,
           'brand_id' => $Product->brand_id,
           'quantity' => $Product->quantity,
        );
        
        print_r(json_encode($product_item));
        ?>