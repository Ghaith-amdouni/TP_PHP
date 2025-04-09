<?php
class Etudiant {
    private $nom;
    private $notes;

    // Constructor
    public function __construct($nom, $notes = []) {
        $this->nom = $nom;
        $this->notes = $notes;
    }

    // Method to display notes
    public function afficherNotes() {
        foreach ($this->notes as $note) {
            $couleur = "";
            if ($note < 10) {
                $couleur = "background-color: red;";
            } elseif ($note > 10) {
                $couleur = "background-color: green;";
            } else {
                $couleur = "background-color: orange;";
            }
            echo "<span style='display:inline-block;width:30px;text-align:center;margin:2px;{$couleur}color:white;'>$note</span>";
        }
    }

    // Method to calculate average
    public function calculerMoyenne() {
        if (count($this->notes) === 0) return 0;
        return array_sum($this->notes) / count($this->notes);
    }

    // Method to check if student is admitted
    public function estAdmis() {
        return $this->calculerMoyenne() >= 10 ? "Admis" : "Non admis";
    }

    // Method to display student's information
    public function afficherInfos() {
        echo "<h2>Étudiant : $this->nom</h2>";
        echo "<p>Notes : ";
        $this->afficherNotes();
        echo "</p>";
        $moyenne = number_format($this->calculerMoyenne(), 2);
        echo "<p>Moyenne : <strong>$moyenne</strong></p>";
        echo "<p>Résultat : <strong>{$this->estAdmis()}</strong></p>";
    }
}
?>