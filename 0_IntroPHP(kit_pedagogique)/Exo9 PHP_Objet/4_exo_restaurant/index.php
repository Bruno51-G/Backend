<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <title>Gestion liste des restaurants</title>
</head>
<body>

    <h1><img class="texteDeco" src="./assets/img/textDeco2.png" alt="Décoration de texte à gauche"> 
    Critiques de restaurants
    <img class="texteDeco" src="./assets/img/textDeco1.png" alt="Décoration de texte à droite"></h1>

    <?php

require "./src/dao/Dbconnexion.php";
require "./src/dao/RestaurantRepository.php";
require "./src/vues/tableau.php";


//$ObjDbconnect = Dbconnexion::getInstance();

//var_export($ObjDbconnect);

$objResto = new RestaurantRepository();

$mesData = $objResto->searchByNote((7));

//var_dump($obtResto->searchAll());

//var_dump($objResto->searchById(1));

//var_export($objResto->searchByName("jean-yve-shillinguer"));

//var_export($objResto->searchByNote(9));

echo afficherTableau($mesData);

?>
</body>
<script>
    const monBouton = document.querySelector("#boutonResto");
    monBouton.addEventListener("click", function(){
        window.location.href='./creationFormulaire.php';
    })
</script>
</html>

