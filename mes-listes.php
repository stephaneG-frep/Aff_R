<?php
require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/lib/pdo.php";
require_once __DIR__. "/lib/list.php";

if(isset($_SESSION['user'])) {
    $lists = getListsByUserId($pdo, $_SESSION['user']['id'], );
}
?>

   <div class="container">

       <div class="d-flex align-item-center justify-content-between">
           <h1>Mes listes</h1>
           <a href="ajout-modification-liste.php" class="btn btn-primary">Ajouter une liste</a>
       </div>

       <div class="row">

    
        <?php if (isset($_SESSION['user'])) { 
            if ($lists) { 
                foreach ($lists as $list) { ?>

        <div class="col-md-4 my-2">
            <div class="card w-100" >
            <div class="card-header d-flex align-item-center justify-content-evenly">
                 <i class="bi bi-list-ol"></i>
                 <h5 class="card-title"><?=$list['title'] ?></h5>
            </div>
            <div class="card-body d-flex justify-content-between align-item-end">              
                <a href="#" class="btn btn-primary">Voir la liste</a>
                <div >
                    <span class="badge rounded-pill text-bg-primary">
                        <i class="bi <?=$list['category_icon']?>"></i>
                        <?=$list['category_name']  ?>
                    </span>
                </div>
            </div>
            </div>
        </div>

                <?php } ?>
            <?php } else { ?>
               <p>Vous n'avez aucunes listes de crées</p>
            <?php } ?>


        <?php } else { ?>
            <p>Pour consulter vos listes, vous devez vous connecté</p>
            <a href="login.php" class="btn btn-outline-primary me-2">Connexion</a>
        <?php } ?>  

       </div>

   </div>






<?php
require_once __DIR__. "/templates/footer.php";
?>