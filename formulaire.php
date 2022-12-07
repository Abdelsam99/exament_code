<?php

$modifcode = (isset($_GET['codepro']) and !empty($_GET['codepro'])) ? $_GET['codepro'] : null;
$modifnom = (isset($_GET['nompro']) and !empty($_GET['nompro'])) ? $_GET['nompro'] : null;
$modifdate = (isset($_GET['date']) and !empty($_GET['date'])) ? $_GET['date'] : null;
$modifduree = (isset($_GET['duree']) and !empty($_GET['duree'])) ? $_GET['duree'] : null;
$modifnomlocal = (isset($_GET['nomlocal']) and !empty($_GET['nomlocal'])) ? $_GET['nomlocal'] : null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire</title>
</head>

<body>
    <div class="content">
        <h1>SAISIE DES PROJETS</h1>
        <br />
        <form action="enregistrement.php" method="post">
            <input name="key" type="hidden" value="<?= $modifcode ?>" />
            <table class="table">
                <tr>
                    <td> <label for="code">Code projet</label></td>
                    <td><input type="text" name="code" id="code" value="<?= $modifcode ?>"></td>
                </tr>
                <tr>
                    <td><label for="nomprojet">Nom du projet</label></td>
                    <td> <input type="text" name="nomprojet" id="nomprojet" value="<?= $modifnom ?>"></td>
                </tr>
                <tr>
                    <td><label for="date">Date de lancement</label></td>
                    <td><input type="date" name="date" id="date" value="<?= $modifdate ?>"></td>
                </tr>
                <tr>
                    <td><label for="duree">Durée</label></td>
                    <td><input type="text" name="duree" id="duree" value="<?= $modifduree ?>"></td>
                </tr>
                <tr>
                    <td><label for="local">Localite</label></td>
                    <td>
                        <select name="local" id="local">
                            <?php
                            $db = new PDO('mysql:host=localhost;dbname=projetexam2021', 'root', '');
                            $reponse = $db->query('SELECT distinct codelocalite, nomlocalite FROM localite');
                            while ($donnees = $reponse->fetch()) {
                                if ($_GET['nomlocal'] === $donnees['nomlocalite']) {

                                    // $modifnomlocal = (isset($_GET['nomlocal']) and !empty($_GET['nomlocal'])) ? $_GET['nomlocal'] : $donnees['codelocalite'];
                                    echo '<option selected value="' .  $donnees['codelocalite'] . '">' . $donnees['nomlocalite'] . '</option>';
                                } else {
                                    echo ' <option value="' . $donnees['codelocalite'] . '">' . $donnees['nomlocalite'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <?php if (isset($_GET['codepro'])) { ?>
                        <td><input type="submit" name="btnmodif" value="Soumettre"></td>
                    <?php } else { ?>
                        <td><input type="submit" name="btn" value="Soumettre"></td>
                    <?php } ?>
                    <td><input type="reset" name="sup" value="Annuler"></td>
                </tr>
            </table>
        </form>
    </div>
    <?php include('liste.php'); ?>
</body>

</html>
