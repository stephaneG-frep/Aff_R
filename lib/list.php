<?php

// fonction de récupération des listes en BDD
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

// fonction d'ajout et de modification en BDD 

function saveList(PDO $pdo, string $title, int $userId, int $categoryId, int $id=null):int|bool
{
    if ($id) {
      // si il y a un id alors UPDATE
    } else {
      // si il n'y a pas un id alors INSERT
      $query = $pdo->prepare("INSERT INTO list (title, category_id, user_id)
                              VALUES (:title, :category_id, :user_id)");
      
    }
      $query->bindValue(':title', $title, PDO::PARAM_STR);
      $query->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
      $query->bindValue(':user_id', $userId, PDO::PARAM_INT);

      $res = $query->execute();
      // si ok => retourne id
        if ($res) {
            if ($res) {
               return $id;
            } else {
                return $pdo->lastInsertId();
            }          
        } else {
      // si pas ok => false
           return false;
        }
}