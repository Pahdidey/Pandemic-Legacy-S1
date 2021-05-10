<?php
	$recSQL = "UPDATE pandemiclegacys1_cartes SET etat = 'Non Disponible', id_joueur = NULL";
	$result = mysqli_query($link , $recSQL);
	mysqli_free_result($result);

	$recSQL = "UPDATE pandemiclegacys1_roles SET id_joueur = NULL";
	$result = mysqli_query($link , $recSQL);
	mysqli_free_result($result);
		
	mysqli_close($link);

	header("Location: index.php?page=joueur&idjoueur={$_SESSION['id']}");
?>