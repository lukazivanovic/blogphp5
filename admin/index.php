<?php
//require('../config/connection.php');
require('../config/klase.php');

if(!isset($_SESSION['login'])){ ?>
<form method="POST" >
	<input type="text" name="email" placeholder="Email" />
	<input type="password" name="lozinka" placeholder="Лозинка" />
	<input type="submit" name="login" value="Пријави се" />
</form>
<?php }else{ ?>
<a href="logout.php">Одјави се</a>
<?php 
} 

if(isset($_POST['login'])){
	$email = $_POST['email'];
	$lozinka = md5($_POST['lozinka']);
	$conn->adminIndexLogin($email,$lozinka);
	header('Location: index.php');
}

if(isset($_SESSION['ime'])){ ?>
	
	<h1>Dobrodosli <?php echo $_SESSION['ime'] ?></h1>
	<?php include("lista_komentara.php"); ?>
	<?php }else{ ?>
	<h1>Dobrodosli</h1>
	<?php }
	

?>
