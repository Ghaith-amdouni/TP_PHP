<?php
require_once 'class.php';

$etudiants = [
    new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]),
    new Etudiant("Skander", [15, 9, 8, 16])
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats Étudiants</title>
</head>
<body style="font-family: Arial, sans-serif;">

<h1>Résultats des étudiants</h1>

<?php
foreach ($etudiants as $etudiant) {
    //appel de la méthode afficherInfos de l'objet
    //etudiant pour afficher ses informations
    $etudiant->afficherInfos();
    echo "<hr>";
}
?>

</body>
</html>
