<?php
	if (!empty($_POST)) {

		$recSQL = "UPDATE pandemiclegacys1_cartes SET etat = 'Non Disponible', id_joueur = NULL";
		$result = mysqli_query($link , $recSQL);
		mysqli_free_result($result);


		$recSQL = "UPDATE pandemiclegacys1_roles SET id_joueur = NULL";
		$result = mysqli_query($link , $recSQL);
		mysqli_free_result($result);


		$recSQL = "SELECT * FROM pandemiclegacys1_joueurs";
		$result = mysqli_query($link , $recSQL);
		while ($ligne = mysqli_fetch_array($result)) {
			$idRole = 'perso-' . $ligne['id'];
			$idRole = $_POST[$idRole];

			$recSQL2 = "UPDATE pandemiclegacys1_roles SET id_joueur = '{$ligne['id']}' WHERE id = {$idRole}";
			$result2 = mysqli_query($link , $recSQL2);

			mysqli_free_result($result2);
		}

		mysqli_free_result($result);

		$recSQL = "UPDATE pandemiclegacys1_cartes SET etat = 'Disponible' WHERE type = 'Ville'";
		$result = mysqli_query($link , $recSQL);
		mysqli_free_result($result);

		foreach($_POST['event'] as $event) {
			$recSQL = "UPDATE pandemiclegacys1_cartes SET etat = 'Disponible' WHERE nom = '{$event}'";
			$result = mysqli_query($link , $recSQL);
		}

		mysqli_free_result($result);

		$recSQL = "SELECT count(id_joueur) AS total FROM pandemiclegacys1_roles";
        $result = mysqli_query($link , $recSQL);
        $ligne = mysqli_fetch_array($result);

        $nbTotalParticipants = $ligne['total'];

        mysqli_free_result($result);

        $recSQL = "SELECT COUNT(*) AS total FROM pandemiclegacys1_cartes WHERE etat = 'Disponible'";
        $result = mysqli_query($link , $recSQL);
        $ligne = mysqli_fetch_array($result);

        $max = $ligne['total'];

        mysqli_free_result($result);

        if ($nbTotalParticipants == 4) {
        	$nbCartesParJoueur = 2;
        } elseif ($nbTotalParticipants == 3) {
        	$nbCartesParJoueur = 3;
        } elseif ($nbTotalParticipants == 2) {
        	$nbCartesParJoueur = 4;
        }

        $nbTotalParticipants = $nbTotalParticipants * $nbCartesParJoueur;
        $cartesJoueurs = array();
        while($nbTotalParticipants != 0) {
          $nbAuHasard = mt_rand(1, $max);
          if(!in_array($nbAuHasard, $cartesJoueurs)) {
            $cartesJoueurs[] = $nbAuHasard;
            $nbTotalParticipants--;
          }
        }


        $recSQL = "SELECT id_joueur FROM pandemiclegacys1_roles WHERE id_joueur IS NOT NULL";
        $result = mysqli_query($link , $recSQL);
        $joueursPartie = array();
        while ($ligne = mysqli_fetch_array($result)) {
        	for ($i=0; $i<$nbCartesParJoueur; $i++) {
			    $joueursPartie[] = $ligne['id_joueur'];
			}
        }


        mysqli_free_result($result);

        $y = 0;

        foreach($joueursPartie as $valeur) {
            $recSQL = 
            "UPDATE pandemiclegacys1_cartes 
            SET 
            id_joueur = {$joueursPartie[$y]},
            etat = 'Non disponible'
            WHERE id = {$cartesJoueurs[$y]}";
            $result = mysqli_query($link , $recSQL);
            $ligne = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            $y++;
        }

        mysqli_close($link);
        
        header("Location: index.php?page=joueur&idjoueur={$_SESSION['id']}");
	}
?>