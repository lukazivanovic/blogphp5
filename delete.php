<?php
//require('config/connection.php');
require('config/klase.php');
$id = $_GET["id"];
$conn->deletePage($id);
//$query = "DELETE from strane where id_strana='$id'";
//if($conn->query($query)==true){
if($conn->deletePage($id)==true){
    header("location:index.php");
}

?>