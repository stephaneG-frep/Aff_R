<?php

require_once __DIR__. "/lib/pdo.php";



if (isset($_POST['inscription'])){
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $requete = $pdo->prepare("INSERT INTO user VALUES (0, :nickname, :email, :password)");
    $requete->execute(
       array(
        "nickname" => $nickname,
        "email" => $email,
        "password" => $hashedPassword,
       )
    );


   
   header('location: index.php');
}

?>