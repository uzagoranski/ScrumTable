<?php

require('includes/config.php');

if (!isset($_SESSION['ime'])) {

    require (MYSQL);


    foreach($_POST['uporabniki'] as $uporabnik) {

        $qu = "INSERT INTO uporabnikhasprojekt(idUporabnik, idProjekt) VALUES('$uporabnik', '{$_GET['idProjekt']}')";
        $ru = mysqli_query($dbc, $qu) or trigger_error("Query: $qu\n<br />MySQL Error: " . mysqli_error($dbc));

    }

    $url = BASE_URL . 'project.php?idProjekt='. $_GET['idProjekt'];
    header("Location: $url");
}