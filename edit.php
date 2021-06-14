<?php 
//require('config/connection.php');
require('config/klase.php'); ?>

<?php

$id = $_GET['id'];

if(isset($_POST['edit'])){
		
	$naslov = $_POST['naslov'];
	$sadrzaj = $_POST['sadrzaj'];
	$autor = $_POST['autor'];
	
	$conn->updatePage($naslov,$sadrzaj,$autor,$id);
	header('Location:index.php');
}
$strana = $conn->getStrana($id);
 ?>

<form method="POST" >
	<input type="text" name="naslov" value="<?php echo $strana["naslov"] ?>" placeholder="Наслов" />
	<textarea name="sadrzaj"  placeholder="Садржај" ><?php echo $strana["sadrzaj"] ?></textarea>
	<input type="text" value="<?php echo $strana["autor"] ?>" name="autor" placeholder="Аутор" />
	<input type="submit" name="edit"value="Измени страну" />
</form>

<?php 

	
?>