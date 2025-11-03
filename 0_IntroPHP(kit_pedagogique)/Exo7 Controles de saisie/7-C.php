<?php
/* Vous devez créer une fonction pour permettre l'identification d'un utilisateur.
Pour cet exercice, les mots de passe ne sont pas chiffrés.
Soit le tableau d'utilisateurs suivant (récupéré depuis une base de données) :
$users = [
 'joe' => 'Azer1234!', 
 'jack' => 'Azer-4321', 
 'admin' => '1234_Azer',
];
Créez une fonction « userLogin() » acceptant 3 arguments :
1) le nom d'utilisateur (string). 
2) le mot de passe à tester (string).
3) le tableau d'utilisateurs où effectuer la recherche (array).
Cette fonction retourne un booléen qui vaut true si l'utilisateur a été trouvé et que les mots de passe correspondent. 
La fonction retourne false dans le cas contraire (utilisateur non trouvé OU mot de passe invalide).
Pour cet exercice, vous devez vous servir des fonctions créées dans les exercices précédents. */