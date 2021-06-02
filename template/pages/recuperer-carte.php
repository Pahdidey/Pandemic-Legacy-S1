<!DOCTYPE html>
<html lang="fr">
    <?php include(incl . 'head.php'); ?>
        
    <body>

        <?php
            $idPart = $_GET['idpart'];
        ?>

        <header>
            <h1>Récupérer une carte</h1>
        </header>

        <section class="container">
        	<div class="box">
                <form action="" method="POST">
                    <div class="flex">
                        <?php
                            $recSQL = "SELECT id, nom FROM pandemiclegacys1_cartes WHERE etat = 'Non Disponible' AND id_joueur is NULL";
                            $result = mysqli_query($link , $recSQL);
                            while ($ligne = mysqli_fetch_array($result)): 
                        ?>
                            <div class="flex25 card-selection">
                                <input type="radio" id="<?php echo $ligne['id']; ?>" name="carte" value="<?php echo $ligne['id']; ?>" class="invisible" required>
                                <label for="<?php echo $ligne['id']; ?>">
                                    <img src="./img/cartes/<?php echo $ligne['nom']; ?>.png">
                                </label>
                            </div>
                        <?php endwhile; ?>

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
                $recSQL = "UPDATE pandemiclegacys1_cartes SET id_joueur = {$idPart} WHERE id = {$_POST['carte']}";
                $result = mysqli_query($link , $recSQL);

                mysqli_close($link);
                
                echo "<script type='text/javascript'>window.location.href = 'index.php?page=joueur&idjoueur={$_SESSION['id']}#{$idPart}';</script>";
            }
        ?>


        <?php mysqli_close($link); ?>

        <?php include(incl . 'footer.php'); ?>

    </body>
</html>
