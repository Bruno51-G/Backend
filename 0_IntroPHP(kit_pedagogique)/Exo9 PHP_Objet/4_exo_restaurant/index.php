<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <title>Gestion liste des restaurants</title>
</head>

    

<?php

require "./src/dao/Dbconnexion.php";
require "./src/dao/RestaurantRepository.php";
require "./src/vues/tableau.php";


//$ObjDbconnect = Dbconnexion::getInstance();
//var_export($ObjDbconnect);
//$mesData = $objResto->searchByNote((7));
//var_dump($obtResto->searchAll());
//var_dump($objResto->searchById(1));
//var_export($objResto->searchByName("jean-yve-shillinguer"));
//var_export($objResto->searchByNote(9));

$msg = "";
$objResto = new RestaurantRepository();
if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (!empty($_POST["suppr"]))
            {
                echo "<script>alert('Vous voulez supprimer le restaurant sélectionné ?');</script>";
                $test = $objResto->deleteRestaurant($_POST["suppr"]);
                if ($test)
                    {
                        $msg .= "Ligne bien supprimée !";
                    } else {
                        $msg .= "Échec de la supression.";
                    }
            }
    }
?>

<body>

    <h1><img class="texteDeco" src="./assets/img/textDeco2.png" alt="Décoration de texte à gauche"> 
    Critiques de restaurants
    <img class="texteDeco" src="./assets/img/textDeco1.png" alt="Décoration de texte à droite"></h1>

    <input class="creaCritique" type="button" value="Créer une critique" id="boutonResto">

    <?php

    echo $msg;
    echo afficherTableau($objResto->searchAll());

    ?>

    <footer>
        <p>© Bruno GODBILLOT</p>
        <p>Exercice : 4_EXO_RESTAURANT</p>
    </footer>

</body>
<script>
    const monBouton = document.querySelector("#boutonResto");
    monBouton.addEventListener("click", function(){
        window.location.href='./creationFormulaire.php';
    })
</script>
</html>

