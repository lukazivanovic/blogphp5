<?php 
if(!isset($_SESSION['login'])){ ?>
	<form method="POST" >
		<input type="text" name="email" placeholder="Email" />
		<input type="password" name="lozinka" placeholder="Лозинка" />
		<input type="submit" name="login" value="Пријави се" />
	</form>
	<a href="register.php">Региструј се</a>
<?php }else{ ?>
<a href="logout.php">Одјави се</a>
<a href="add_post.php">Додај страну</a>
<?php } ?>


<?php 

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$lozinka = md5($_POST['lozinka']);
		$rez = $conn->login($email,$lozinka);

		if($rez){
			$_SESSION['id']= $rez['id'];
			$_SESSION['ime'] = $rez['ime_prezime'];
			$_SESSION['login'] = TRUE;
		}
		
		header('Location: index.php');
	}

?>
<?php if(isset($_SESSION['ime'])){ ?>
	
<h1>Dobrodosli <?php echo $_SESSION['ime'] ?></h1>
<?php }else{ ?>
<h1>Dobrodosli</h1>
<?php } ?>