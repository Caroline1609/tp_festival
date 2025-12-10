<?php
use src\dao\CandidateRepository; 

function ctrlAccueil(CandidateRepository $objCandidat)
{
    $data = $objCandidat->searchAll();
    
    include "./src/views/home.php";
}