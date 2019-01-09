<?php

require('includes/config.php');

if (!isset($_SESSION['ime'])) {

    require (MYSQL);

    $q1 = "SELECT * FROM projekt WHERE idProjekt = {$_GET['idProjekt']}";
    $r1 = mysqli_query($dbc, $q1) or trigger_error("Query: $q1\n<br />MySQL Error: " . mysqli_error($dbc));

    $results = mysqli_fetch_array($r1, MYSQLI_ASSOC);

    $stevilo = ++$results['steviloSprintov'];

    $q2 = "UPDATE projekt SET steviloSprintov = {$stevilo} WHERE idProjekt = {$_GET['idProjekt']}";
    $r2 = mysqli_query($dbc, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($dbc));

    $q3 = "INSERT INTO sprint(naziv, idProjekt) VALUES ('Sprint $stevilo', {$_GET['idProjekt']})";
    $r3 = mysqli_query($dbc, $q3) or trigger_error("Query: $q3\n<br />MySQL Error: " . mysqli_error($dbc));

    $url = BASE_URL . 'project.php?idProjekt='. $_GET['idProjekt'];
    header("Location: $url");
}