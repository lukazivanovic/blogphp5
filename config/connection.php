<?php
$conn = new mysqli('localhost','root','','blog');
if($conn->connect_error){
	die('Neuspesna konekcija');
}

session_start();