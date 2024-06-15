<?php
   
   require_once __DIR__. "/templates/header.php";
   require_once __DIR__. "/lib/pdo.php";
   require_once __DIR__. "/lib/user.php";


   $errors = [];

   // si verifier et bon 
   if (isset($_POST['loginUser'])) {
      $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
        
   
      if ($user) {
      // si bon utilisateur alors on connecte => session
          $_SESSION['user'] = $user;
      // rediriger vers la page d'accueil
          header('location: index.php');
      } else {
      // sinon message d'erreur
           $errors[] = "mot de passe ou email incorrect";
      }

   }

 ?>

<div class="container col-xxl-8 px-4 py-5">
   
   <h1>Connexion</h1>

   <?php
      foreach ($errors as $error) { ?>
         <div class="alert alert-danger" role="alert">
            <?=$error; ?>
         </div> 
      <?php }
   ?>

   <form action="" method="post">
       <div class="mb-3">
           <label for="email" class="form-label">Email</label>
           <input type="email" name="email" id="email" class="form-control">
       </div>

       <div class="mb-3">
           <label for="password" class="form-label">Mot de passe</label>
           <input type="password" name="password" id="password" class="form-control">
       </div>

       <input type="submit" name="loginUser" value="Connexion" class="btn btn-primary">

    </form>

</div>



<?php require_once __DIR__. "/templates/footer.php"; ?>