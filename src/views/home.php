<?php

$data = $data ?? []; 

function displayData($data): string
{
    // Retourner une chaîne même si $data est vide
    if (empty($data)) {
        return "Aucune donnée disponible.";
    }

    // Exemple de traitement des données
    return "Données affichées : " . print_r($data, true);
}

// Appel de la fonction
echo displayData($data);
?>