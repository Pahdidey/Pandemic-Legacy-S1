<!DOCTYPE html>
<html lang="fr">
    <?php include(incl . 'head.php'); ?>
        
    <body>

        <header>
            <h1>Erreur</h1>
        </header>

        <section class="container">
            <div class="box">
                <p>Cette page n'existe pas</p>
                <div class="actions">
                    <a href="index.php?page=joueur&idjoueur=<?php echo $_SESSION['id']; ?>" class="button close">Revenir au profil</a>
                </div>
            </div>           
        </section>

        <?php include(incl . 'footer.php'); ?>

    </body>
</html>