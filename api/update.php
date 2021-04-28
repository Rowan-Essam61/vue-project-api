<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-control-Allow-Method: PUT');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-type,Access-Control-Allow-Method,Authorization, X-Requested-With ');


//initialize api
include_once('../core/initialize.php');

$User=new user($db);
$data= json_decode(file_get_contents("php://input"));
$User->username = $data->User_Name;
$User->firstname = $data->First_Name;
$User->lastname = $data->Last_Name;
$User->age = $data->Age;
$User->address = $data->Address;
$User->gender = $data->Gender;
$User->password = $data->Password;
$User->email = $data->Email;
$User->phone = $data->Phone;
$User->update();

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