<?php

function afficherTableau(array $data) :string
{
    $chaine = "<table><thead><tr>";
    foreach($data[0] as $key => $value)
        {
            $chaine.="<th>".$key."</th>";
        }

        $chaine.="</tr></thead><tbody>";

    for ($i=0; $i < count($data); $i++)
        { 
            $chaine.="<tr>";

            foreach ($data[$i] as $key => $value) {
                $chaine.="<td>".$value."</td>";
            }

            $chaine.="</tr>";
        } $chaine.="</tbody></table>";
    return $chaine; 
}

?>
