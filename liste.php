<link rel="stylesheet" href="style.css">
<style>
    .liste>tr,
    td {
        padding: 10px;
    }
</style>
<?php
$db = new PDO('mysql:host=localhost;dbname=projetexam2021', 'root', '');
$reponse = $db->query('SELECT codeprojet,nomprojet,datelancement,duree,nomlocalite FROM projet,localite WHERE projet.codelocalite=localite.codelocalite order by codeprojet ASC');
echo '<table style="border-collapse:collapse; margin: 10px auto;" border=1 width="700" class="liste">';
echo '<tr>
		<th>Code projet</th>
		<th>Nom du projet</th>
		<th>Date de lancement</th>
		<th>Durée</th>
		<th>Localité</th>
		<th>Action</th>
	</tr>';
foreach ($reponse as $donnees) {
    // while ($donnees = $reponse->fetch()) {
    echo '<tr>';
    echo '<td>' . $donnees['codeprojet'] . '</td>';
    echo '<td>' . $donnees['nomprojet'] . '</td>';
    echo '<td>' . $donnees['datelancement'] . '</td>';
    echo '<td>' . $donnees['duree'] . '</td>';
    echo '<td>' . $donnees['nomlocalite'] . '</td>';
    echo '<td><a href="formulaire.php?codepro=' . $donnees['codeprojet'] . '&nompro=' . $donnees['nomprojet'] . '
	&date=' . $donnees['datelancement'] . '&duree=' . $donnees['duree'] . '&nomlocal=' . $donnees['nomlocalite'] . '">
    Modifier</a>
    </td>';
    echo '</tr>';
}
echo '</table>';
