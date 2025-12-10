<?php
use src\dao\CandidateRepository; 

function ctrlAccueil()
{
    $objCandidat = new CandidateRepository();
    $data = $objCandidat->searchAll();
    
    include "./src/views/home.php";
}