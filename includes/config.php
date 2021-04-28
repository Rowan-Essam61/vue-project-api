<?php

$servername = "localhost";
  $username = "root";
  $password1  = "";
$dbname='vtp';


    $db= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password1);
    $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db -> setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,false);


    define('APP_NAME','PHP REST API');
?>
