<?php 
//require('config/connection.php');
require('config/klase.php');
 ?>
<?php 

$conn->selectKorisnik();

?>
<form method="POST" >
	<input type="text" name="ime" placeholder="Име и презиме" />
	<input type="text" name="email" placeholder="Email" />
	<input type="password" name="lozinka" placeholder="Лозинка" />
	<select name="tip_korisnika">
	<?php foreach($korisnici as $korisnik){ ?>
	<option value="<?php echo $korisnik[0]; ?>"><?php echo $korisnik[1]; ?></option>
	<?php } ?>
	</select>
	<input type="submit" name="register" value="Пријави се" />
</form>

<?php 

	if(isset($_POST['register'])){
		
		$ime = $_POST['ime'];
		$email = $_POST['email'];
		$lozinka = md5($_POST['lozinka']);
		$tip = $_POST['tip_korisnika'];
		
		$korisnik->register($ime,$email,$lozinka,$tip);
			
	}

?>