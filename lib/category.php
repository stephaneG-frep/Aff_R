<?php


function getCategories(PDO $pdo):array
{
    // requette préparée en BDD qui recupère les categories
    $query = $pdo->prepare("SELECT * FROM category");
    $query->execute();
    // fetchAll nous permet de recuperer toutes les lignes dans un (tableau ASSOCiatif)
    
    //retourne les categories
        return $query->fetchALL(PDO::FETCH_ASSOC);

}