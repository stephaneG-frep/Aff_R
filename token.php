<?php
session_start();
require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/lib/pdo.php";


if (isset($_GET['token']) && $_GET['token'] != '')
{
    $stmt = $pdo->prepare("SELECT email FROM user WHERE token = ?");
    $stmt->execute([$_GET['token']]);
    $email = $stmt->fetchColumn();

    if($email)
    { 
    ?>
    
    <div class="container col-xxl-8 px-4 py-5 ">
          <form method="post">
            <div class="mb-3">
               <label for="newPassword" class="label-control">Nouveau mot de passe : </label>
               <input type="password" name="newPassword" class="form-control">
               <input class="btn btn-primary" type="submit" value="Confirmer">
            </div>
          </form>
    </div>        
     <?php

    }
}

if (isset($_POST['newPassword']))
{
    $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    //$sql = "UPDATE user SET password = ?, token = NULL WHERE email = ?";
    $stmt = $pdo->prepare("UPDATE user SET password = ?, token = NULL WHERE email = ?");
    $stmt->execute([$hashedPassword, $email]);
    echo "Mot de passe modifier avec succés";
    
}

require_once __DIR__. "/templates/footer.php";
?>
