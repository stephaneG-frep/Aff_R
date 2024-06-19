<?php
session_start();
require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/lib/pdo.php";

if (isset($_SESSION['user'])) {
  header('location: index.php');

}
if (!empty($_POST)){
  extract($_POST);
  $valid = true;

   if (isset($_POST['inscription'])) {
      $nickname = htmlentities(trim($nickname));
      $email = htmlentities(strtolower(trim($email)));
      $password = trim($password);
      $password2 = trim($password2);

       if (empty($nickname)) {
          $valid = true;
          $er_nom = "le surnom ne peut ètre vide";
       }
       if (empty($email)) {
        $valid = true;
        $er_email = "l'Email ne peut ètre vide";
     }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $eamil)) {
        $valid = true;
        $er_email = "Email non valide";
     } 
     if (empty($password)) {
        $valid = false;
        $er_password = " M-D-P ne peut ètre vide";
     }elseif($password != $password2) {
         $valid = false;
         $er_password = "La confirmation du M-D-P ne correspond pas";
     }
     if ($valid = newUserLogin($pdo, $_POST['nickname'], $_POST['email'], $_POST['password'])) {

        header("location: index.php");
     }
   }
}

?>


<div class="container ">

<div class=" col-md-8 d-flex align-items-center justify-content-between">
 <h1>Inscription</h1>



<form action="traitement.php" method="post"> 
   
  <div class="mb-3">
    <label for="nickname">Votre surnom</label>
    <input type="text" name="nickname" id="nickname" class="form-contrl" required>
  </div>

  <div class="mb-3">
    <label for="email">Votre email</label>
    <input type="email" name="email" id="email" class="form-contrl" required>
  </div>

  <div class="mb-3">
    <label for="password">Votre mot de passe</label>
    <input type="password" name="password" id="password" class="form-contrl" required>
  </div>

  <div class="mb-3">
    <label for="password2">Confirmer votre mot de passe</label>
    <input type="password" name="password2" id="password2" class="form-contrl" required>
  </div>

    <button type="submit" name="inscription">Enregisrter</button>

    <a href="index.php">Connection</a>



</form>
</div>
</div>


<?php
require_once __DIR__. "/templates/footer.php";
?>