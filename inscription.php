<?php
session_start();
require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/lib/pdo.php";



?>


<div class="container col-xxl-8 px-4 py-5 ">


       <h1>Inscription</h1>

    <form action="traitement.php" method="post"> 
   
        <div class="mb-3 ">
           <label for="nickname" class="form-label">Votre surnom</label>
           <input type="text" name="nickname" id="nickname" class="form-control" required>
        </div>

        <div class="mb-3">
           <label for="email" class="form-label">Votre email</label>
           <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Votre mot de passe</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="password2" class="form-label">Confirmer votre mot de passe</label>
          <input type="password" name="password2" id="password2" class="form-control" required>
        </div>

        <button type="submit" name="inscription" class="btn btn-primary">Enregisrter</button>

        <a href="index.php" class="btn btn-primary">Connection</a>

        <span class="psw"><a href="forgot_password.php">Mot de passe oublié ?</a></span>

    </form>

</div>


<?php
require_once __DIR__. "/templates/footer.php";
?>