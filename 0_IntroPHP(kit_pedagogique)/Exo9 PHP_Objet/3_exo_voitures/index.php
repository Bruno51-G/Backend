<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'Voiture.php';
require_once 'VoitureCourse.php';
require_once 'Moteur.php';

try {
    $v1 = new Voiture("Peugeot", "208", "Peugeot", 250, 900);
    echo $v1->toString();
    echo "<br>";
    echo $v1->getleMoteur()->toString();
    echo "<hr>";

    $v2 = new VoitureCourse("Ferrari", "F40", "Ferrari", 350, 850);
    echo $v2->toString();
    echo "<br>";
    echo $v2->getleMoteur()->toString();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}