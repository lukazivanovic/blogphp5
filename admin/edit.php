<?php
//require('config/connection.php');
require('../config/klase.php');
$id = $_GET["id"];
$conn->editKomentar($id);
if($conn->editKomentar($id)==true){
    header("location:index.php");
}

?>