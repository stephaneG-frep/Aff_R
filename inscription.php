<?php
require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/lib/pdo.php";
require_once __DIR__. "/lib/user.php";

?>
<div class="container">
<form action="" method="post"></form>    
<div class="row g-3 align-items-center">
<div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Surnom : </label>
  </div>
  <div class="col-auto">
    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
  </div> 
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Mot-de-passe : </label>
  </div>
  <div class="col-auto">
    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
  </div>

  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Confirmer mot-de-passe : </label>
  </div>
  <div class="col-auto">
    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
  </div>
  <div class="mb-3">
                <input type="submit" value="Enregister" name="inscription" class="btn btn-primary">
            </div>
</div>
</div>

</div>


<?php
require_once __DIR__. "/templates/footer.php";
?>