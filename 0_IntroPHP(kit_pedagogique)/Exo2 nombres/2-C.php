<?php
/* Créer une fonction getMulti() qui accepte deux arguments de type float. 
Elle devra retourner la multiplication des deux valeurs. 
Limitez le résultat à 2 décimales. */

function getMulti(float $a, float $b) : float
{
    return round($a * $b, 2);
}

echo getMulti(1.255, 1.003) . "\n";
echo getMulti(1.742, 2.0074);

?>
