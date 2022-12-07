<?php
$db = new PDO('mysql:host=localhost;dbname=projetexam2021', 'root', '');
if (isset($_POST['btn'])) {
    if (!empty($_POST['code']) and !empty($_POST['nomprojet']) and !empty($_POST['date']) and !empty($_POST['duree']) and !empty($_POST['local'])) {
        if ($db) {
            $code = $_POST['code'];
            $nomprojet = $_POST['nomprojet'];
            $date = $_POST['date'];
            $duree = $_POST['duree'];
            $local = $_POST['local'];
            $req = $db->prepare('INSERT INTO projet(codeprojet,nomprojet,datelancement,duree,codelocalite) VALUE(?,?,?,?,?)');
            $req->execute(array($code, $nomprojet, $date, $duree, $local));
            header('location:formulaire.php');
        } else {
            echo 'La connexion ne fonctionne pas';
        }
    } else {
        echo 'Les champs sont vides Veillez reprendre';
    }
}
if (isset($_POST['btnmodif'])) {
    $code = $_POST['key'];
    $nomprojet = $_POST['nomprojet'];
    $date = $_POST['date'];
    $duree = $_POST['duree'];
    $local = $_POST['local'];
    $req = $db->prepare('UPDATE projet SET nomprojet=?,datelancement=?,duree=?,codelocalite=? WHERE codeprojet=?');
    $req->execute(array($nomprojet, $date, $duree, $local, $code));
    echo ('<script type="text/javascript">alert("Modification effectuée")</script>');
    header('location:formulaire.php');
}
