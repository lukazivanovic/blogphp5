<?php 

$str = $conn->getStrane();
?>
<ul>
<?php
if($str!=false){
foreach($str as $strana){ ?>
	<li><a href="strana.php?id=<?php echo $strana[0] ?>"><?php echo $strana[1] ?></a>
	<?php if(isset($_SESSION['ime'])){ ?> 
		- <a href="edit.php?id=<?php echo $strana[0] ?>">Измени</a> -- <a href="delete.php?id=<?php echo $strana[0]; ?>"><button onclick=potvrda()>Обриши</button></a>
	<?php }?>
	</li>
<?php
}}
?>
</ul>

<script>
function potvrda(){
	confirm("Да ли си сигуран да желиш да обришеш страну?");
}
</script>