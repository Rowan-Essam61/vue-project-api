<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initialize api
include_once('../core/initialize.php');

$User=new user($db);

$result =$User->read();

if( count( get_object_vars( $result ) )>0){
    $user_arr=array();
    $user_arr['data']=array();
    while($row =$result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $user_item=array(
            'username'=> $User_Name,
            'firstname'=> $First_Name,
            'lastname' => $Last_Name,
            'age'=> $Age,
           'password' =>$Password,
            'email' => $Email,
           'address'=> $Address,
           'phone' => $Phone,
           'gender' => $Gender,
        );
        array_push($user_arr['data'],$user_item);
    }
    echo json_encode($user_arr);
}
else{
    echo "no";
echo json_encode(array('message'=>'No User found'));
}
?>