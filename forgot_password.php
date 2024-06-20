<?php

require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/lib/pdo.php";


?>
<div class="container col-xxl-8 px-4 py-5">
    <h2>Mot de passe oublié</h2>
    <form method="post">
        <div class="mb-3">
            <label for="email" class="form-label"><b>Email</b></label>
            <input class="form-control"  type="email" placeholder="Enter Email" name="email" required>
            <button type="submit" class="btn btn-primary mt-3">Send me a token</button>
        </div>
    </form>
</div>


<?php
    if (isset($_POST['email'])) {
    $token = uniqid();
    $url = "http://localhost/my_php/Aff_R/token?token=$token.php";

    $subject = 'Mot de passe oublié';
    $message = "Bonjour, voici votre lien pour votre nouveau mot de passe : $url";
    $headers = 'Content-Type: text/plain; charset="UTF-8"';

    if (mail($_POST['email'], $subject, $message, $headers)) {

        $sql = "UPDATE user SET token = ? WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$token, $_POST['email']]);
        echo "E-mail envoyé";
    } else {
        echo "Une erreur est survenue";
    }
} 
?>


<?php
require_once __DIR__. "/templates/footer.php";
?>