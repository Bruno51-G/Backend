<?php

function displayData($data): string
{
    $chaineHtml = "<table class='tabStyle'><thead><tr>";
        foreach ($data[0] as $key => $value) 
            {
                $chaineHtml .= "<th>" . htmlspecialchars($key) . "</th>";
            }
    $chaineHtml .= "</tr></thead><tbody>";
        foreach ($data as $ligne)
            {
                $chaineHtml .= "<tr>";
                foreach ($ligne as $key => $value)
                    {
                        $chaineHtml .= "<td>" . htmlspecialchars($value) . "</td>";
                    }
                    $chaineHtml .= "</tr>";
            }
            $chaineHtml .= "</tbody></table>";
            
            return $chaineHtml;
}

echo displayData($dataCandidat);

?>