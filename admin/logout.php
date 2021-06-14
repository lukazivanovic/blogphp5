<?php 
//require('config/connection.php');
require('../config/klase.php'); ?>
<?php
session_destroy();
header('Location: index.php');
?>