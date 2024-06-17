<?php
 require_once __DIR__. "/templates/header.php";

/*  A fire quand ta oublié le premier password hached dans ta BDD
*   $hash = password_hash('admin', PASSWORD_DEFAULT);
*   var_dump($hash); recopier le résultat du var_dump dans la BDD
*/  

?>

  

  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="assets/images/todo.jpg" class="d-block mx-lg-auto img-fluid" alt="logo du nsite" width="400" height="300" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Gardez vos liste avec vous !</h1>
        <p class="lead">Bienvenu sur Aff_R votre platforme de création de listes de taches. Avec Aff_r plus de problèmes d'oublies.
           Aff_R est là pour vous rendre service. créez vos liste et le tour est joué ! Ne perdez plus la main sur vos taches quotidiennes.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
        </div>
      </div>
    </div>
  </div>

<div class="container">
  <div class="row text-center">
    <h2>Découvrez les fonctionnalitées principales : </h2>

        <div class="col-md-4 my-2">
            <div class="card w-100" >
            <div class="card-header">
                <i class="bi bi-card-list"></i>
            </div>
            <div class="card-body">
                <h3 class="card-title">Créer un nombre illimité de listes</h3>
                <a href="ajout-modification-liste.php" class="btn btn-primary">S'inscrire</a>
            </div>
            </div>
        </div>

        <div class="col-md-4 my-2">
            <div class="card w-100" >
            <div class="card-header">
                 <i class="bi bi-bookmarks-fill"></i>
            </div>
            <div class="card-body">
                <h3 class="card-title">Classer les listes par catégories</h3>
                <a href="#" class="btn btn-primary">S'inscrire</a>
            </div>
            </div>
        </div>

        <div class="col-md-4 my-2">
            <div class="card w-100" >
            <div class="card-header">
                 <i class="bi bi-search"></i>
            </div>
            <div class="card-body">
                <h3 class="card-title">Retrouver facilement vos listes</h3>
                <a href="mes-listes.php" class="btn btn-primary">S'inscrire</a>
            </div>
            </div>
        </div>

  </div>
</div>

<?php require_once __DIR__. "/templates/footer.php"; ?>
