<?php

function ctrlAccueil()
{
    $objCandidat = new CandidateRepository();
    $data = $objCandidat->searchAll(); 
    
    // Debug si besoin
    // var_dump($data);
    
    include "./src/views/home.php";
}
?>