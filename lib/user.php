<?php 

//fonction de verification -> pdo,email, password avec typage : (bool array)
function verifyUserLoginPassword(PDO $pdo, string $email, string $password):bool|array
{
    // requette en BDD de l'email existant
    $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    // fetch nous permet de recuperer une seule ligne
    $user = $query->fetch(PDO::FETCH_ASSOC);
    
    // condition de verif
     if ($user && password_verify($password, $user['password'])) {
        // verif : ok
        return $user;
     }else{
        // verif : pas ok
        return false;
     }

}