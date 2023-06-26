<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'MBS';


$connect = mysqli_connect('localhost','root','','MBS');

//checking the connection
if(mysqli_connect_errno())
{
	die('Database is not connected'.mysqli_connect_error());
}

?>