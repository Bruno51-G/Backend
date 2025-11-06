<?php
require_once 'Contribuable.php';

function display():string{
    $result='';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["send"])){
            if(empty($_POST["nom"]) || empty($_POST["revenu"])){
                echo('Le formulaire est incomplet');
            } else {
                $name = htmlspecialchars(($_POST["nom"]));
                    $income = floatval($_POST["revenu"]);

                $contrib = new Contribuable($name, $income);
                $result = " Votre impôt est de " . $contrib->calculImpot(). " €";
            }
        }
    }
    return $result;
}