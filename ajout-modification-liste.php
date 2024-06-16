<?php
require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/lib/pdo.php";
require_once __DIR__. "/lib/list.php";
require_once __DIR__. "/lib/category.php";

if (!isUserConnected()) {
    header('Location: login.php');
}

$categories = getCategories($pdo);

$errorsList = [];
$errorsListItem = [];
$messagesList = [];

$list = [
    'title' => '',
    'category_id' => '',
];

// formulaire d'ajout/modif.. a été envoyé 
if (isset($_POST['saveList'])) {
    // si titre n'est pas vide on appel la fonction saveList
    if (!empty($_POST['title'])) {
        $id = null;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $res = saveList($pdo, $_POST['title'], (int)$_SESSION['user']['id'], $_POST['category_id'], $id);
        
        if ($res) {
           // si ok 
           if ($id) {
           $messagesList[] = "Modification bien éffectuée";
           } else {
           header("location: ajout-modification-liste.php?id=" . $res);
           }
        } else {
            // si pas ok erreur
            $errorsList[] = "La liste n'a pas été enregistrée";
        }
    } else {
    // si titre vide afficher erreur
      $errorsList[] = "Le titre est obligatoire";
    }
}
if (isset($_POST['saveItem'])) {
    if (!empty($_POST['name'])) {
// sauvegarger
       $res = saveListItem($pdo, $_POST['name'], (int)$_GET['id'], false);
    } else {
// erreur
       $errorsListItem[] = "Le nom de l'item est obligatoire.";
    }
}

$editMode = false;
if (isset($_GET['id'])) {
    $list = getListById($pdo, (int)$_GET['id']);
    $editMode = true;
}

?>

<div class="container col-xxl-8 ">
   
    <h1>Ajout.. ou modif.. une liste</h1>

    <!-- Pour les erreurs -->
    <?php foreach ($errorsList as $error) { ?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
    <?php } ?>
    <!-- pour les messages -->
    <?php foreach ($messagesList as $message) { ?>
        <div class="alert alert-success">
            <?= $message; ?>
        </div>
    <?php } ?>

<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button <?= ($editMode) ? 'collapsed' : '' ?> " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="<?= ($editMode) ? 'false' : 'true' ?>" aria-controls="collapseOne">
        <?= ($editMode) ? $list['title'] : 'Ajouter une liste' ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse <?= ($editMode) ? '' : 'show' ?>" data-bs-parent="#accordionExample">
      <div class="accordion-body">
         <form action="" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" value="<?=$list['title']?>" name="title" id="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categorie</label>
                <select name="category_id" id="category_id" class="form-control">
                    <?php foreach($categories as $category) { ?>
                        <option 
                        <?=($category['id'] === $list['category_id']) ? 'selected="selected"' : '' ?>
                         value="<?=$category['id'] ?>"><?=$category['name'] ?></option>
                    <?php } ?>
                   
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" value="Enregister" name="saveList" class="btn btn-primary">
            </div>

         </form>
      </div>
    </div>
</div>

<div class="row mt-3">
    <?php if (!$editMode) { ?>
        <div class="alert alert-warning">
            Après avoir enregistré, vous pourrez ajouter les items.
        </div>
    <?php } else { ?>
        <h2 class="border-top pt-3">Items</h2>
   
         <!-- Pour les erreurs -->
    <?php foreach ($errorsListItem as $error) { ?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
    <?php } ?>


        <form method="post" class="d-flex">
           <input type="checkbox" name="status" id="status">
           <input type="text" name="name" id="name" placeholder="Ajouter un item" class="form-control mx-3">
           <input type="submit" name="saveItem" class="btn btn-primary" value="Enregistrer">
        </form>
    <?php } ?>
</div>


</div>




<?php
require_once __DIR__. "/templates/footer.php";
?>