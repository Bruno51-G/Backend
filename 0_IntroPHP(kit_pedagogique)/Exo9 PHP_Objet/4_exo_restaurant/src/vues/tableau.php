<?php

function afficherTableau(array $data) :string
{
    $chaine = "<table><thead><tr>";
    foreach($data[0] as $key => $value)
        {
            $chaine.="<th>".$key."</th>"; //les clés du tableau associatif correspondent aux noms des colonnes
        }

        $chaine.="<th> modifier</th>";
        $chaine .= "<th> Supprimer</th>";

        $chaine.="</tr></thead><tbody>"; //ouverture du corps du tableau

    for ($i=0; $i < count($data); $i++) //parcours des lignes
        { 
            $chaine.="<tr>"; //ouverture d'une ligne

            foreach ($data[$i] as $key => $value) { //parcours des colonnes
                $chaine.="<td>".$value."</td>"; //affichage de la valeur
            }

            $chaine .= '<td> <img class="imgBouton" src="./assets/img/ajouter.png" alt="ajouter"></td>';
            $chaine .= '<td> <img class="imgBouton" src="./assets/img/supprimer.png" alt="supprimer"></td>';

            $chaine.="</tr>";
        } $chaine.="</tbody></table>";
    return $chaine; 
}

?>
