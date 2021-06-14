<?php 

$kom = $conn->getNeobjavljeniKomentari();
?>
<ul>
<?php
if($kom!=false){
foreach($kom as $komentar){ ?>
	<li><?php echo $komentar[1]."<br>".$komentar[3]."<br>".$komentar[5]."<br>".$komentar[2]."<br>"; ?>
	<?php if(isset($_SESSION['ime'])){ ?> 
		- <a href="edit.php?id=<?php echo $komentar[0] ?>">Подврди</a> -- <a href="delete.php?id=<?php echo $komentar[0]; ?>"><button onclick=potvrda()>Обриши</button></a>
	<?php }?>
	</li>
<?php
}}
?>
</ul>

<script>
function potvrda(){
	confirm("Да ли си сигуран да желиш да обришеш коментар?");
}
</script>