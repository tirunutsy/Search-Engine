<?php
$servername="localhost";
$username="root";
$password="";
$dbname="google_new";

//to create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
	//echo "Connection Sucess";
}
else 
{
	//die("Connection Failed ".mysqli_connect_error());
}

?>