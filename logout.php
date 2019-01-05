<?php
$page_title = 'Odjava';

require('includes/config.php');
include('includes/header.php');

// če v seji ni shranjenega imena, lahko uporabnika samo preusmerimo
if (!isset($_SESSION['ime'])) {

    $url = BASE_URL . 'index.php';
    ob_end_clean();
    header("Location: $url");
    exit();

} else { // v nasprotnem primeru odjavimo uporabnika

    $shraniIme = $_SESSION['ime'];

    $_SESSION = array(); // izbris sejnih spremenljivk
    session_destroy(); // uničevanje seje
    setcookie (session_name(), '', time()-3600); // izbris piškotkov

    $url = BASE_URL . 'index.php';
    ob_end_clean();
    header("Location: $url");
    exit();
}