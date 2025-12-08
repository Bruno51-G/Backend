<?php

function ctrlAccueil()
{
    $objCandidat = new candidateRepository();

    $dataCandidat = $objCandidat->searchAll();

    include "./src/views/home.php";
}