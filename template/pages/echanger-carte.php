<!DOCTYPE html>
<html lang="fr">
    <?php include(incl . 'head.php'); ?>
        
    <body>

        <?php
            $idPart = $_GET['idpart'];
            $carteEchange = $_GET['idcarte'];
        ?>

        <header>
            <h1>Échanger une carte</h1>
        </header>

        <section class="container">
        	<div class="box center">
                <img src="./img/cartes/<?php echo $carteEchange; ?>.png" alt="" width="250">
                <form action="" method="POST" class="margin-top width50 automargin">
                    <div>
                        <label for="echange-carte">À qui donner la carte ?</label>
                        <select id="echange-carte" name="echange-carte">
                        <?php
                            $recSQL = 
                            "SELECT
                            pandemiclegacys1_roles.id AS idRole,
                            pandemiclegacys1_roles.nom AS nomRole,
                            pandemiclegacys1_roles.fichier AS fichierRole,
                            pandemiclegacys1_joueurs.nom AS nomJoueur,
                            pandemiclegacys1_joueurs.id AS idJoueur  
                            FROM pandemiclegacys1_roles
                            INNER JOIN pandemiclegacys1_joueurs ON pandemiclegacys1_roles.id_joueur = pandemiclegacys1_joueurs.id
                            WHERE pandemiclegacys1_joueurs.id != {$idPart}";

                            $result = mysqli_query($link , $recSQL);
                            while ($ligne = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $ligne['idJoueur']; ?>"><?php echo $ligne['nomJoueur']; ?></option>
                        <?php } ?>
                        </select>
                        <?php mysqli_free_result($result); ?>
                    </div>
                    <button type="submit" id="button">Valider</button>
                </form>
			</div>

            <div class="actions">
                <a href="index.php?page=joueur&idjoueur=<?php echo $_SESSION['id']; ?>" class="button close">Revenir au profil</a>
            </div>
            
        </section>

        <?php
            if (!empty($_POST)) {
                $recSQL = "UPDATE pandemiclegacys1_cartes SET id_joueur = {$_POST['echange-carte']} WHERE id = '{$carteEchange}'";
                $result = mysqli_query($link , $recSQL);

                mysqli_close($link);
        
                header("Location: index.php?page=joueur&idjoueur={$_SESSION['id']}#{$idPart}");
            }
        ?>


        <?php mysqli_close($link); ?>

        <?php include(incl . 'footer.php'); ?>

    </body>
</html>
