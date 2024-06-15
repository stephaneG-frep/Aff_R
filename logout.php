<?php

require_once __DIR__. "/lib/session.php";

// Prévient les attaques de fixation de session
session_regenerate_id(true);

// suprimer les données de session du serveur
session_destroy();

// supprime de la mémoire
unset($_SESSION);

// renvoyer a la page de connexion
header('location: index.php');


