<?php

require('includes/config.php');

if (!isset($_SESSION['ime'])) {

    require (MYSQL);

    $q1 = "SELECT * FROM task WHERE idTask = {$_GET['idTask']}";
    $r1 = mysqli_query($dbc, $q1) or trigger_error("Query: $q1\n<br />MySQL Error: " . mysqli_error($dbc));

    $results = mysqli_fetch_array($r1, MYSQLI_ASSOC);

    $stevilo = --$results['stanje'];

    $q2 = "UPDATE task SET stanje = {$stevilo} WHERE idTask = {$_GET['idTask']}";
    $r2 = mysqli_query($dbc, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($dbc));

    $url = BASE_URL . 'sprint.php?idSprint='. $_GET['idSprint'];
    header("Location: $url");
}