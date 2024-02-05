<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'Ebookinglk';


$connect = mysqli_connect('localhost','root','','Ebookinglk');

//checking the connection
if(mysqli_connect_errno())
{
	die('Database is not connected'.mysqli_connect_error());
}

?>