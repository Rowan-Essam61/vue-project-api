<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//initialize api
include_once('../core/initialize.php');
$Category=new category($db);

$Category->id=isset($_GET['ID']) ? $_GET['ID'] : die();
$Category->read_single();
$user_item=array(
            'id'=> $Category->id,
            'name'=> $Category->name
        );

        print_r(json_encode($user_item));
        ?>