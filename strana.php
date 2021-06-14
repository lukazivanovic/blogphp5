<?php
require('config/klase.php');
$id = $_GET['id'];

$strana = $conn->getStrana($id);

$komentari = $conn->getKomentari($id);
?>
 
 <?php include("blocks/login.php") ?>
 
 <h1 style="color: red"><?php echo $strana['naslov'] ?></h1>
 <p><?php echo $strana['sadrzaj'] ?></p>

<form method="POST" action="">
    <input type="text" name="ime" value="" placeholder="Име" />
    <textarea name="sadrzaj" placeholder="Садржај"></textarea>
	<input type="submit" name="comment" value="Додај коментар" />
</form>

<?php
    if($komentari==false){
    echo "Нема коментара.";
}else{
    foreach($komentari as $komentar){
        echo $komentar[5]."<br>".$komentar[2]."<br><br>";
    }
}
 
if(isset($_POST['comment'])){	
		$ime = $_POST['ime'];
		$sadrzaj = $_POST['sadrzaj'];
		
        $conn->insertKomentar($id,$sadrzaj,$ime);

        echo "Успешно послат коментар.";
	}
?>
 
 <?php include("blocks/lista_strana.php") ?>