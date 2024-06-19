<?php

try
{
    $pdo = new PDO("mysql:dbname=Aff_R;host=localhost;charset=utf8mb4", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['inscription'])){
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $requete = $pdo->prepare("INSERT INTO user VALUES (0, :nickname, :email, MD5(:password))");
    $requete->execute(
       array(
        "nickname" => $nickname,
        "email" => $email,
        "password" => $password,
       )
    );

   header('location: index.php');
}

?>