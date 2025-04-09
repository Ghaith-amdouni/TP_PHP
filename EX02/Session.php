<?php
class Session {
    // Démarre la session si ce n'est pas déjà fait
    public function demarrer() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Obtient le nombre de visites de l'utilisateur
    public function getVisites() {
        if (!isset($_SESSION['visites'])) {
            $_SESSION['visites'] = 0;
        }
        return $_SESSION['visites'];
    }

    // Incrémente le nombre de visites de l'utilisateur
    public function incrementerVisite() {
        $_SESSION['visites'] = $this->getVisites() + 1;
    }

    // Réinitialise la session
    public function reset() {
        session_unset(); // Effacer toutes les variables de session
        session_destroy(); // Détruit la session
    }
}
?>
