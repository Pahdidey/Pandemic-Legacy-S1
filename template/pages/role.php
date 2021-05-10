<!DOCTYPE html>
<html lang="fr">
    <?php include(incl . 'head.php'); ?>
        
    <body>

        <?php
            $recSQL = "SELECT * FROM pandemiclegacys1_roles WHERE id = {$_GET['idrole']}";
            $result = mysqli_query($link , $recSQL);
            $ligne = mysqli_fetch_array($result);
        ?>

        <header>
            <h1><?php echo $_SESSION['nom']; ?></h1>
        </header>

        <section class="container">
            <div>
                <div class="center">
                    <img src="./img/cartes/<?php echo $ligne['fichier']; ?>.jpg" alt="" >
                    <div class="actions">
                        <a href="index.php?page=joueur&idjoueur=<?php echo $_SESSION['id']; ?>" class="button close">Revenir au profil</a>
                    </div>
                </div> 
            </div>

        <?php mysqli_free_result($result); ?>
            
        </section>

        <?php include(incl . 'footer.php'); ?>

    </body>
</html>
