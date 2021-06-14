<?php 
require('config/klase.php');
?>
    <script src="ckeditor/ckeditor.js"></script>

<?php if(isset($_SESSION['login'])){ ?>

<form method="POST" >
	<input type="text" name="naslov" placeholder="Naslov" />
	<textarea placeholder="Sadrzaj" name="sadrzaj" id="text"></textarea>
	<input type="submit" name="add"	value="Dodaj stranu" />
</form>

<?php 

	if(isset($_POST['add'])){
		$naslov = $_POST['naslov'];
		$sadrzaj = $_POST['sadrzaj'];
		$autor = $_SESSION['id'];	
		
		$conn->addPost($naslov,$sadrzaj,$autor);
	}

?>

<?php }else{ ?>
<h1>Ниси улогован</h1>
<?php } ?>

<script>
 CKEDITOR.replace( 'text' );
</script>
