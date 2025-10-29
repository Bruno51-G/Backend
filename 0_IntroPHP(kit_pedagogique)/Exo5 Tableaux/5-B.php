<?php
/* Créer une fonction « lastItem() » acceptant un argument de type array. 
Elle devra retourner le dernier élément du tableau. Si le 
tableau est vide, il faudra retourner null. */

function lastItem(array $myArray) : mixed
{
    if(empty($myArray)) {
        return "null";
    } else {
        return end($myArray);
    }
}

$fruit = (["pomme", "pêche", "fraise", "poire", "raisin"]);
echo lastItem($fruit);

?>

