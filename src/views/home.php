<?php
$data = $data ?? [];

function displayData(array $data): string
{
    if (empty($data)) {
        return "<p>Aucune donnée disponible.</p>";
    }

    // Vérifie si $data est un tableau de tableaux (ex: liste de candidats)
    if (isset($data[0]) && is_array($data[0])) {
        $html = "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
        $html .= "<thead><tr>";

        // Affiche les en-têtes du tableau (noms des colonnes)
        foreach ($data[0] as $key => $value) {
            $html .= "<th>" . htmlspecialchars($key) . "</th>";
        }
        $html .= "</tr></thead><tbody>";

        // Affiche les lignes du tableau
        foreach ($data as $row) {
            $html .= "<tr>";
            foreach ($row as $cell) {
                $html .= "<td>" . htmlspecialchars($cell) . "</td>";
            }
            $html .= "</tr>";
        }
        $html .= "</tbody></table>";
        return $html;
    }
    // Si $data n'est pas un tableau de tableaux, affiche-le simplement
    else {
        return "<pre>" . htmlspecialchars(print_r($data, true)) . "</pre>";
    }
}

// Appel de la fonction
echo displayData($data);
?>
