<?php


function getListsByUserId(PDO $pdo, int $userId):array
{
    // requette préparée en BDD des listes de l'utilisateur
    $query = $pdo->prepare("SELECT list.*, category.name as category_name,
                            category.icon as category_icon
                            FROM list
                            JOIN category ON category.id = list.category_id
                            WHERE user_id = :user_id");
                            
    $query->bindValue(':user_id', $userId, PDO::PARAM_INT);
    $query->execute();
    // fetchAll nous permet de recuperer toutes les lignes dans un (tableau ASSOCiatif)
    $lists = $query->fetchALL(PDO::FETCH_ASSOC);
    
    
        return $lists;

}