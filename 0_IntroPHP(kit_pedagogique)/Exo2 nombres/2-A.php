<?php
//Créer une fonction « getSum() » qui accepte deux arguments de type int. Elle devra retourner la somme des deux valeurs. 

function getSum(int $a, int $b) : int
{
    return $a + $b;
}

//Appel de la fonction
$resultat = getSum(5, 3);
echo $resultat; //Affiche le résultat

?>

