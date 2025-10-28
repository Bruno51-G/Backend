<?php
/*  Créer une fonction « isMajor() » acceptant un argument de type int. 
Elle devra retourner un booléen. 
Si l’âge est supérieur ou égal à 18, 
elle doit retourner true. Sinon elle doit retourner false.*/

function isMajor(int $age) : bool
{
    if ($age >= 18) 
        {
            return False;
        } else 
        {
            return True;
        }
}

$age = readline("Entrez votre age : ");

echo isMajor($age) ? 'false' : 'true';

?>

