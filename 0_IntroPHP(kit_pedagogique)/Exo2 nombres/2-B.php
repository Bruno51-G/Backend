<?php
//Créer une fonction « getSub() » qui accepte deux arguments de type int. Elle devra retourner la soustraction des deux valeurs.

function getSub(int $a, int $b) : int
{
    return $a - $b;
}

echo getSub(5, 3) . "\n";
echo getSub(3, 5);

?>

