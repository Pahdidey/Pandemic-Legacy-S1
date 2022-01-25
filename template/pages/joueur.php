<!DOCTYPE html>
<html lang="fr">
    <?php include(incl . 'head.php'); ?>
        
    <body>

        <?php if ($_SESSION['id'] == $_GET['idjoueur']) { ?>

            <header>
                <h1><?php echo $_SESSION['nom']; ?></h1>
                <p>Mini compagnon pour Pandemic Legacy Saison 1</p>
            </header>

            <section class="container">
            	<div>
                    <?php
                        $recSQL = "SELECT count(id_joueur) AS total FROM pandemiclegacys1_roles";
                        $result = mysqli_query($link , $recSQL);
                        $ligne = mysqli_fetch_array($result);

                        $nbJoueursSansRole = $ligne['total'];

                        mysqli_free_result($result);

                        if ($nbJoueursSansRole > 0) {
                    ?>
                        <aside id="sidemenu">
                            <?php
                                $recSQL = 
                                "SELECT
                                pandemiclegacys1_joueurs.nom AS nomJoueur,
                                pandemiclegacys1_joueurs.id AS idJoueur  
                                FROM pandemiclegacys1_roles
                                INNER JOIN pandemiclegacys1_joueurs ON pandemiclegacys1_roles.id_joueur = pandemiclegacys1_joueurs.id";
                                $result = mysqli_query($link , $recSQL);

                                while ($ligne = mysqli_fetch_array($result)):
                            ?>
                                <a href="#<?php echo $ligne['idJoueur']; ?>"><?php echo $ligne['nomJoueur']; ?></a>
                            <?php endwhile; ?>
                        </aside>

                        <div id="joueurs">
                            <div>
                            <?php
                                mysqli_free_result($result);

                                $recSQL = 
                                "SELECT
                                pandemiclegacys1_roles.id AS idRole,
                                pandemiclegacys1_roles.nom AS nomRole,
                                pandemiclegacys1_roles.fichier AS fichierRole,
                                pandemiclegacys1_joueurs.nom AS nomJoueur,
                                pandemiclegacys1_joueurs.id AS idJoueur  
                                FROM pandemiclegacys1_roles
                                INNER JOIN pandemiclegacys1_joueurs ON pandemiclegacys1_roles.id_joueur = pandemiclegacys1_joueurs.id";

                                $result = mysqli_query($link , $recSQL);

                                while ($ligne = mysqli_fetch_array($result)) {
                            ?>
                                <div class="box" id="<?php echo $ligne['idJoueur']; ?>">
                                    <h2><?php echo $ligne['nomJoueur']; ?> (<?php echo $ligne['nomRole']; ?>)<a href="index.php?page=role&idrole=<?php echo $ligne['idRole']; ?>" class="small-margin-left"><span class="material-icons">remove_red_eye</span></a></h2>
                                    <div class="flex">
                                        <?php
                                            $recSQL2 = "SELECT id, nom FROM pandemiclegacys1_cartes WHERE id_joueur = {$ligne['idJoueur']}";
                                            $result2 = mysqli_query($link , $recSQL2);

                                            while ($ligne2 = mysqli_fetch_array($result2)) {
                                        ?>
                                            <div class="flex25">
                                                <img src="./img/cartes/<?php echo $ligne2['nom']; ?>.png" alt="" >
                                                <ul class="buttons">
                                                    <li><a href="index.php?page=defausser-carte&idpart=<?php echo $ligne['idJoueur']; ?>&idcarte=<?php echo $ligne2['id']; ?>" class="button CRed"><i class="material-icons">delete</i></a></li>
                                                    <li><a href="index.php?page=echanger-carte&idpart=<?php echo $ligne['idJoueur']; ?>&idcarte=<?php echo $ligne2['id']; ?>" class="button C5"><i class="material-icons">loop</i></a></li>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                      <?php mysqli_free_result($result2); ?>
                                    </div>
                                    <div class="box-actions right">
                                        <a href="index.php?page=piocher-carte&idpart=<?php echo $ligne['idJoueur']; ?>" class="button add">Piocher une carte</a>
                                        <a href="index.php?page=recuperer-carte&idpart=<?php echo $ligne['idJoueur']; ?>" class="button call_missed C2">Récupérer une carte</a>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php mysqli_free_result($result); ?>

                            </div>
                        </div>

                    <?php } ?>



                    <?php if ($_SESSION['id'] == 1) { ?>
                        <div class="flex buttons margin-bottom">
                            <div class="flex50">
                                <a href="#" class="button C3 center open-modal" data-modal="nouvelle-partie"><span class="material-icons">add_circle_outline</span>Créer une partie</a>
                            </div>
                            <div class="flex50">
                                <a href="index.php?page=remise-a-zero" class="button C5 center"><span class="material-icons">error_outline</span>Remettre à zéro</a>
                            </div>
                        </div>

                        <div class="modal" id="nouvelle-partie">
                            <div class="overlay"></div>
                            <div class="content">
                                <?php include(pages . 'nouvelle-partie.php'); ?>
                            </div>
                        </div>
                    <?php } ?>




                    <div class="box">
                        <h2>Aides de jeu</h2>
                        <div class="accordion">
                            <div>
                                <h3>Rôles</h3>
                                <div>
                                    <div class="flex">
                                        <?php                              
                                            $recSQL = "SELECT * FROM pandemiclegacys1_roles";
                                            $result = mysqli_query($link , $recSQL);

                                            while ($ligne = mysqli_fetch_array($result)) {
                                        ?>
                                        <div class="flex33">
                                            <a href="./img/cartes/<?php echo $ligne['fichier']; ?>.jpg" class="open-lightbox"><img src="./img/cartes/<?php echo $ligne['fichier']; ?>.jpg" alt=""></a>
                                        </div>
                                        <?php 
                                            } 
                                            mysqli_free_result($result);
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3>Événements</h3>
                                <div>
                                    <div class="flex">
                                        <?php                              
                                            $recSQL = "SELECT * FROM pandemiclegacys1_cartes WHERE type = 'Evenement'";
                                            $result = mysqli_query($link , $recSQL);

                                            while ($ligne = mysqli_fetch_array($result)) {
                                        ?>
                                        <div class="flex25">
                                            <a href="./img/cartes/<?php echo $ligne['nom']; ?>.png" class="open-lightbox"><img src="./img/cartes/<?php echo $ligne['nom']; ?>.png" alt=""></a>
                                        </div>
                                        <?php 
                                            } 
                                            mysqli_free_result($result);
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3>Actions</h3>
                                <div>
                                    <div class="flex">
                                        <div class="flex33">
                                            <a href="./img/cartes/actions1.jpg" class="open-lightbox"><img src="./img/cartes/actions1.jpg" alt=""></a>
                                        </div>
                                        <div class="flex33">
                                            <a href="./img/cartes/actions2.jpg" class="open-lightbox"><img src="./img/cartes/actions2.jpg" alt=""></a>
                                        </div>
                                        <div class="flex33">
                                            <a href="./img/cartes/actions3.jpg" class="open-lightbox"><img src="./img/cartes/actions3.jpg" alt=""></a>
                                        </div>
                                        <div class="flex33">
                                            <a href="./img/cartes/actions4.jpg" class="open-lightbox"><img src="./img/cartes/actions4.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

 
    			</div>
                
            </section>

        <?php } else { ?>
            <p class="center">Vous n'avez pas accès à ce profil</p>
        <?php } ?>

        <?php mysqli_close($link); ?>



        <?php include(incl . 'footer.php'); ?>

    </body>
</html>
