<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initialize api
include_once('../core/initialize.php');

$Brand=new brand($db);

$result =$Brand->read();

if( count( get_object_vars( $result ))>0){
    $user_arr=array();
    $user_arr['data']=array();
    while($row =$result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $user_item=array(
            'id' => $ID,
            'name'=> $Name,
            'logo'=> $Logo
     
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