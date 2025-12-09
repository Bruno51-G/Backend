<?php

function ctrlAccueil():void
{
    $objCandidat = new candidateRepository();

    $dataCandidat = $objCandidat->searchAll();

    include "./src/views/home.php";
}