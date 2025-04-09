<?php
class AttackPokemon {
    public $attackMinimal;
    public $attackMaximal;
    public $specialAttack;
    public $probabilitySpecialAttack;

    public function __construct($min, $max, $special, $probspecial) {
        $this->attackMinimal = $min;
        $this->attackMaximal = $max;
        $this->specialAttack = $special;
        $this->probabilitySpecialAttack = $probspecial;
    }

    public function getAttackPoints() {
        return rand($this->attackMinimal, $this->attackMaximal);
    }

    public function isSpecialAttack() {
        return rand(1, 100) <= $this->probabilitySpecialAttack;
    }
}
?>