<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initialize api
include_once('../core/initialize.php');

$Orders=new orders($db);

$result =$Orders->read();
$count=count( get_object_vars( $result ) );
echo $count;
if( count( get_object_vars( $result ) )>0){
    $user_arr=array();
    $user_arr['data']=array();


    while($row =$result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $user_item=array(
            'id'=> $ID,
            'product_id'=> $Product_ID,
           'total_price' => $Total_Price,
            'delivery_data'=> $Delivery_Data,
           'order_date' =>$Order_Date,
            'quantity' => $Quantity,
           'username'=> $Username
        
        );
        array_push($user_arr['data'],$user_item);
    }
}
else{
    echo "no";
echo json_encode(array('message'=>'No User found'));
}
?>