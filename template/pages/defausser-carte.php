<?php

	$recSQL = "UPDATE pandemiclegacys1_cartes SET id_joueur = NULL WHERE id = {$_GET['idcarte']}";
	$result = mysqli_query($link , $recSQL);
	mysqli_free_result($result);
		

	mysqli_close($link);
	
	header("Location: index.php?page=joueur&idjoueur={$_SESSION['id']}#{$_GET['idpart']}");
?>