<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//initialize api
include_once('../core/initialize.php');
$Brand=new brand($db);

$Brand->id=isset($_GET['ID']) ? $_GET['ID'] : die();
$Brand->read_single();
$user_item=array(
            'id'=> $Brand->id,
            'name'=> $Brand->name,
            'logo' => $Brand->logo
        );

        print_r(json_encode($user_item));
        ?>