<?php
// Inclure la classe Session
require_once 'Session.php';

// Créer une instance de la classe Session
$session = new Session();
$session->demarrer(); // Démarrer la session si nécessaire

// Incrémenter la visite
$session->incrementerVisite();
$nbVisites = $session->getVisites();

// Afficher le message selon le nombre de visites
if ($nbVisites == 1) {
    echo "<h1>Bienvenue à notre plateforme !</h1>";
} else {
    echo "<h1>Merci pour votre fidélité, c’est votre $nbVisites éme visite.</h1>";
}

// Ajouter un bouton pour réinitialiser la session
//echo with the balise form 
echo '<form method="post">
    <input type="submit" name="reset" value="Réinitialiser la session">
</form>';

// Réinitialiser la session si le bouton est cliqué
if (isset($_POST['reset'])) {
    $session->reset();
    echo "<h2>La session a été réinitialisée.</h2>";
    echo '<a href="">Recharger la page pour commencer à nouveau.</a>';
}
?>
