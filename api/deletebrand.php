<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-control-Allow-Method: DELETE');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-type,Access-Control-Allow-Method,Authorization, X-Requested-With ');


include_once('../core/initialize.php');

$Brand=new brand($db);
$data= json_decode(file_get_contents("php://input"));
$Brand->id = $data->ID;
$User->delete();

//if ($User->create()==true) { 
	//echo json_encode(
//	array('message' => 'createddd')
//	);
//}
//else {
//	echo json_encode(
	//array('message'=>'mtnylt4')
	//);
//}




?>