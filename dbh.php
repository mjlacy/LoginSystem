<?php

$conn = mysqli_connect("localhost", "root", "", "loginsystem");

if (!$conn){
	die("Connection Failed: ".mysqli_connect_error());
}

?>