<?php 


function verifyUserLoginPassword(PDO $pdo, string $email, string $password)
{
    $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $query->bindValue(':email', $email, PDO::PARAM_INT);
    $query->execute();
    // fetch nous permet de recuperer une seule ligne
    $result = $query->fetch(PDO::FETCH_ASSOC);

    var_dump($result);

}