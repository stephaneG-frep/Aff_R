<?php

session_start([
    'cookie_lifetime' => 86400,
]);

function isUserConnected():bool
{
    return isset($_SESSION['user']);
}

?>



