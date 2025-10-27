<?php
/* Créer une fonction getDiv() qui accepte deux arguments de type int. 
Elle devra retourner la division des deux valeurs. 
Limitez le résultat à 2 décimales (arrondi). */

function getDiv(int $a, int $b) : float
{
    if($b == 0)
        {
            return 0;
        } else 
        {
            return round($a / $b, 2);
        }
}

echo getDiv(20, 0) . "\n";
echo getDiv(3, 87);

?>
