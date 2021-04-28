<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initialize api
include_once('../core/initialize.php');
$User=new user($db);

$User->username=isset($_GET['User_Name']) ? $_GET['User_Name'] : die();
$User->read_single();
$user_item=array(
            'username'=> $User->username,
            'firstname'=> $User->firstname,
            'lastname' => $User->lastname,
            'age'=>$User-> age,
           'password' =>$User->password,
            'email' => $User->email,
           'address'=> $User->address,
           'phone' => $User->phone,
           'gender' => $User->gender,
        );

        print_r(json_encode($user_item));
        ?>