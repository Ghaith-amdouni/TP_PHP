<?php
// Pokemon.php
abstract class Pokemon {
    protected $name;
    protected $image;
    protected $hp;
    protected $attackPokemon;
    protected $type = "normal";

    public function __construct($name, $image, $hp, AttackPokemon $atk) {
        $this->name = $name;
        $this->image = $image;
        $this->hp = $hp;
        $this->attackPokemon = $atk;
    }

    // Getter pour le nom
    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function isDead() {
        return $this->hp <= 0;
    }

    public function attack(Pokemon $enemy) {
        $atkPoints = $this->attackPokemon->getAttackPoints();
        $multiplier = $this->getEffectiveness($enemy);

        if ($this->attackPokemon->isSpecialAttack()) {
            $totalDamage = $atkPoints * $this->attackPokemon->specialAttack * $multiplier;
            echo "<p><strong>{$this->getName()}</strong> a effectué une attaque <strong>spéciale</strong>! ";
        } else {
            $totalDamage = $atkPoints * $multiplier;
            echo "<p><strong>{$this->getName()}</strong> a effectué une attaque normale! ";
        }

        $enemy->hp -= $totalDamage;
        if ($enemy->isDead()) {
            echo "{$enemy->getName()} est mort!<br>";
        }
        echo "{$this->getName()} a infligé " . round($totalDamage) . " points de dégât à {$enemy->getName()}</p>";
    }

    abstract protected function getEffectiveness(Pokemon $enemy);

    public function whoAmI() {
        echo "<h2>Pokémon: {$this->getName()}</h2>";
        echo "<img src='{$this->image}' width='150'><br>";
        echo "<strong>HP:</strong> {$this->hp}<hr>";
    }
}

class PokemonFeu extends Pokemon {
    protected $type = "feu";

    protected function getEffectiveness(Pokemon $enemy) {
        return match ($enemy->getType()) {
            "plante" => 2,
            "eau", "feu" => 0.5,
            default => 1,
        };
    }
}

class PokemonEau extends Pokemon {
    protected $type = "eau";

    protected function getEffectiveness(Pokemon $enemy) {
        return match ($enemy->getType()) {
            "feu" => 2,
            "eau", "plante" => 0.5,
            default => 1,
        };
    }
}

class PokemonPlante extends Pokemon {
    protected $type = "plante";

    protected function getEffectiveness(Pokemon $enemy) {
        return match ($enemy->getType()) {
            "eau" => 2,
            "feu", "plante" => 0.5,
            default => 1,
        };
    }
}
?>
