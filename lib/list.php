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


// fonction qui récupaire une liste par son id
function getListById(PDO $pdo, int $id):array|bool
{
    $query = $pdo->prepare("SELECT * FROM list WHERE id = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}



// fonction d'ajout et de modification de liste en BDD 

function saveList(PDO $pdo, string $title, int $userId, int $categoryId, int $id=null):int|bool
{
    if ($id) {
      // si il y a un id alors UPDATE
      $query = $pdo->prepare("UPDATE list SET title = :title, category_id = :category_id,
                              user_id = :user_id
                              WHERE id = :id");
      $query->bindValue(':id', $id, PDO::PARAM_INT);
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


// fonction d'ajout d'items en BDD 

function saveListItem(PDO $pdo, string $name, int $listId, bool $status = false, int $id=null):int|bool
{
    if ($id) {
      // si il y a alors UPDATE
      $query = $pdo->prepare("UPDATE item SET name = :name, list_id = :list_id,
                              status = :status
                              WHERE id = :id");
      $query->bindValue(':id', $id, PDO::PARAM_INT);
    } else {
      // si il n'y a pas alors INSERT
      $query = $pdo->prepare("INSERT INTO item (name, list_id, status)
                              VALUES (:name, :list_id, :status)");
      
    }
      $query->bindValue(':name', $name, PDO::PARAM_STR);
      $query->bindValue(':list_id', $listId, PDO::PARAM_INT);
      $query->bindValue(':status', $status, PDO::PARAM_BOOL);

      return $query->execute();
      
}

// Récupérer les items
function getListItems(PDO $pdo, int $id):array
{
    $query = $pdo->prepare("SELECT * FROM item WHERE list_id = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// supprimer des items
function deleteListItemById(PDO $pdo, int $id):bool
{
     $query = $pdo->prepare("DELETE FROM item WHERE id = :id");
     $query->bindValue(':id', $id, PDO::PARAM_INT);

     return $query->execute();
}