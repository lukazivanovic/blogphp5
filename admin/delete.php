<?php
//require('config/connection.php');
require('../config/klase.php');
$id = $_GET["id"];
$conn->deleteKomentar($id);
if($conn->deleteKomentar($id)==true){
    header("location:index.php");
}

?>