<?php
$server_name='localhost';
$user_name='root';
$password="";
$database="cmis";

$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
	die("Unable to connect".$connection->connect_error);
}
?>