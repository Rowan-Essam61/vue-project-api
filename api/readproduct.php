<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//initialize api
include_once('../core/initialize.php');

$Product=new product($db);

$result =$Product->read();

    if( count( get_object_vars( $result ))){
    $user_arr=array();
    $user_arr['data']=array();
    while( $row =$result->fetch(PDO::FETCH_ASSOC)){
     extract($row);
    ////$rows[]=$row;
        $user_item=array(
            'id'=> $ID,
            'category_id'=> $Category_id,
            'color' => $Colors,
            'size'=> $Sizes,
           'description' =>$Description,
            'price' => $Price,
           'name'=> $Name,
           'brand_id' => $Brand_ID,
           'quantity' => $quantity,
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