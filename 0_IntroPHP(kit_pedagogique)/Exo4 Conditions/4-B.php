<?php
/* Créer une fonction « getRetired() » acceptant un argument de type int. 
Elle devra retourner un string. Cette fonction permet de calculer le nombre d’années 
restant avant la retraite ou le nombre d’années depuis la retraite. 
Pour cet exercice, l’âge de la retraite est fixé à 60 ans. */

function getRetired(int $ageActuel) : string
{
    $ageRetraite = 60;

    if ($ageActuel < 0)
        {
            return "Vous n'êtes pas encore né";
        }

    $ageReste = $ageRetraite - $ageActuel;

    if ($ageReste > 0)
        {
            return "Il vous reste $ageReste ans avant la retraite.";
        } elseif ($ageReste === 0) 
        {
           return "Vous ètes à la retraite cette année.";
        } else 
        {
            return "Vous ètes à la retraite depuis " . abs($ageReste) . " ans.";
        }

}

$ageActuel = readline("Entrez votre age : ");

echo getRetired($ageActuel);

?>

