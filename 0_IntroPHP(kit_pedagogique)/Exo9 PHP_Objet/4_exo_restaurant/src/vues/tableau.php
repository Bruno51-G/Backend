<?php

function afficherTableau(array $data): string
{
    $html = "<table class='styled-table'><thead><tr>";
    foreach (array_keys($data[0]) as $colonne) {
        $html .= "<th>" . htmlspecialchars($colonne) . "</th>";
    }
    $html .= "<th>Modifier</th><th>Supprimer</th></tr></thead><tbody>";

    foreach ($data as $ligne) {
        $id = isset($ligne['id']) ? $ligne['id'] : '';
        $html .= "<tr>";
        foreach ($ligne as $cellule) {
            $html .= "<td>" . htmlspecialchars((string)$cellule) . "</td>";
        }
        $html .= "
            <td>
                <a href='detail.php?id={$id}' class='btn-no-style'>
                    <img class='imgBouton' src='./assets/img/ajouter.png' alt='Modifier'>
                </a>
            </td>
            <td>
                <form action='{$_SERVER["PHP_SELF"]}' method='POST' style='margin:0; padding:0;'>
                    <input type='hidden' name='suppr' value='{$id}'>
                    <button type='submit' name='suppression' class='btn-no-style'>
                        <img class='imgBouton' src='./assets/img/supprimer.png' alt='Supprimer'>
                    </button>
                </form>
            </td>
        </tr>";
    }
    $html .= "</tbody></table>";
    return $html;
}

?>
