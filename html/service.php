<?php
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="root";
$dbname="slov_kart";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();


?>