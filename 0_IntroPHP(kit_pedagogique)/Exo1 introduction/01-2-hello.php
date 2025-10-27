<?php

/*Retourne "Hello $name !" 
@param string $name le nom à afficher */

function hello(string $name) : string
{
    if(empty(trim($name)))
        {
            return "Personne";
        } else {
            return "hello $name !";
        }
}

//test de la fonction (la fonction n'affiche rien. "echo" afficherala valeur retournée par la fonction)

echo hello("");
?>

