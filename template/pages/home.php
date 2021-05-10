<!DOCTYPE html>
<html lang="fr">
    <?php include(incl . 'head.php'); ?>
        
    <body id="home">
        <header>
            <h1>Pandemic Legacy Saison 1</h1>
        </header>

        <section>

            <div>
                <form action="" method="POST">

                    <div>
                        <label for='nom' class="invisible">Pseudo</label>
                        <input type='text' name='nom' id='nom' required placeholder="Pseudo" />
                    </div>

                    <div>
                        <label for='maladie' class="invisible">Maladie</label>
                        <input type='text' name='maladie' id='maladie' required placeholder="Maladie" />
                    </div>

                    <button type="submit">Se connecter</button>

                </form>
            </div>
            
        </section>

        <?php
            $nom = $_POST['nom'];
            $maladie = $_POST['maladie'];

            if (!empty($_POST)) {

                if ( (!empty($nom)) AND (!empty($maladie)) ) {

                    $recSQL = "SELECT * FROM pandemiclegacys1_joueurs WHERE nom = '{$nom}' AND maladie = '{$maladie}'";

                    $result = mysqli_query($link , $recSQL);
                    $row_cnt = mysqli_num_rows($result);
                    $ligne = mysqli_fetch_array($result);

                    echo $row_cnt;

                    if( $row_cnt == 1 ) {
                        $_SESSION['id'] = $ligne['id'];
                        $_SESSION['nom'] = $ligne['nom'];
                        $_SESSION['maladie'] = $ligne['maladie'];

                        mysqli_free_result($result);
                        mysqli_close($link);

                        header("Location: index.php?page=joueur&idjoueur={$_SESSION['id']}");
                    } else {
                        echo "ERREUR";
                    }

                } else {
                    echo "ERREUR";
                }
            }   

            mysqli_close($link);            

        ?>

        <?php include(incl . 'footer.php'); ?>

    </body>
</html>