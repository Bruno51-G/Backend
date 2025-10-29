<?php
/* Créer une fonction « getMax() » acceptant 3 arguments de type float.
Cette fonction doit retourner la valeur du plus grand des 3 nombres. Limitez le résultat à 3 décimales
Si au moins 2 des valeurs fournies sont égales la fonction retourne 0. */

function getMax(float $a, float $b, float $c) : float
{
    if ($a == $b || $a == $c || $b ==$c)
        {
            return 0;
        } else {
            return max($a, $b, $c);
        }
}

$valeur1 = readline("Entrez la valeur a : ");
$valeur2 = readline("Entrez la valeur b : ");
$valeur3 = readline("Entrez la valeur c : ");

$resultat = getMax($valeur1, $valeur2, $valeur3);

$arrondi = round($resultat, 3);

echo "La plus grande valeur est : " . $arrondi;

?>
