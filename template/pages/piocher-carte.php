<?php
	$recSQL = "SELECT id FROM pandemiclegacys1_cartes WHERE etat = 'Disponible' ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($link , $recSQL);
    $ligne = mysqli_fetch_array($result);

    $cartePiochee = $ligne['id'];

    mysqli_free_result($result);

    $recSQL = "UPDATE pandemiclegacys1_cartes SET etat = 'Non Disponible', id_joueur = {$_GET['idpart']} WHERE id = {$ligne['id']}";
	$result = mysqli_query($link , $recSQL);

	mysqli_free_result($result);
		

	mysqli_close($link);

	header("Location: index.php?page=joueur&idjoueur={$_SESSION['id']}#{$_GET['idpart']}");
?>