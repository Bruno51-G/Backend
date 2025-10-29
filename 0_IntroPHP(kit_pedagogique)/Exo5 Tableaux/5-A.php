<?php
/* Créer une fonction « firstItem() » qui accepte un argument de type array. 
Elle devra retourner le premier élément du tableau. Si 
le tableau est vide, la fonction retourne null. */

function firstItem(array $myArray) : mixed
{
    if(empty($myArray)) {
        return "null";
    } else {
        return $myArray[0];
    }
}

$name = (["Pierre", "Martine", "Rogert"]);
echo firstItem($name); // Affiche le premier élément du tableau.

?>

