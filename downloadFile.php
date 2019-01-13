<?php

$page_title = 'Dodajanje datoteke';

require('includes/config.php');

require(MYSQL);

    $file = "uploads/{$_POST['imeDatoteke']}";

    $type = filetype($file);
    // Get a date and timestamp
    $today = date("F j, Y, g:i a");
    $time = time();
    // Send file headers
    header("Content-type: $type");
    header("Content-Disposition: attachment;filename={$_POST['imeDatoteke']}");
    header("Content-Transfer-Encoding: binary");
    header('Pragma: no-cache');
    header('Expires: 0');
    // Send the file contents.
    set_time_limit(0);
    readfile($file);

    $url = BASE_URL . 'sprint.php?idSprint='. $_POST['idSprint'];
    header("Location: $url");