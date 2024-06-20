<?php
require_once __DIR__. "/../lib/pdo.php";

if (isset($_GET['token']) && $_GET['token'] != '')
{
    $stmt = $pdo->prepare("SELECT email FROM user WHERE token = ?");
    $stmt->execute([$_GET['token']]);
    $email = $stmt->fetchColumn();

    if($email)
    {
       ?>
       <!DOCTYPE html>
       <html lang="en">
       <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Récupération du mot de passe</title>
       </head>
       <body>
        <div class="container col-xxl-8 px-4 py-5 ">
          <form method="post">
            <div class="mb-3">
               <label for="newPassword" class="label-control">Nouveau mot de passe : </label>
               <input type="password" name="newPassword" class="form-control">
               <input class="btn btn-primary" type="submit" value="Confirmer">
            </div>
          </form>
        </div>  
       </body>
       </html>
       <?php
    }
}
if (isset($_POST['newPassword']))
{
    $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $sql = "UPDATE user SET password = ? WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hashedPassword, $_POST['email']]);
    echo "Mot de passe modifier avec succés";
}
