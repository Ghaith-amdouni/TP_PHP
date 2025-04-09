<?php
require_once "AttackPokemon.php";
require_once "Pokemon.php";

$atk1 = new AttackPokemon(10, 20, 2, 50);
$atk2 = new AttackPokemon(8, 18, 1.5, 40);

$pokemon1 = new PokemonFeu("Charmander", "images/Charmander.jpg", 100, $atk1);
$pokemon2 = new PokemonPlante("Bulbasaur", "images/bulbasaur.jpg", 100, $atk2);

$pokemon1->whoAmI();
$pokemon2->whoAmI();

while (!$pokemon1->isDead() && !$pokemon2->isDead()) {
    $pokemon1->attack($pokemon2);
    if ($pokemon2->isDead()) break;
    $pokemon2->attack($pokemon1);
}
/// Afficher le gagnant
$winner = $pokemon1->isDead() ? $pokemon2 : $pokemon1;
echo "<h2>{$winner->getname()} a gagné le combat!</h2>";
