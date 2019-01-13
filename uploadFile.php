<?php

$page_title = 'Dodajanje datoteke';

require('includes/config.php');
include('includes/header.php');

require(MYSQL);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

?>

<div id="main-content-wrap">
    <section id="intro">
        <div class="row intro-content">
            <div class="col-twelve">
                <h1 class="animate-intro">
                    Dodajanje / Nalaganje datoteke
                </h1>


<?php
if (file_exists($target_file)) {
    echo '<h3 class="animate-intro" >Datoteka že obstaja.</h3>';
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "zip") {
    echo '<h3 class="animate-intro" >Vaša datoteka nima podprtega formata. Naložite .zip datoteko.</h3>';
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo '<h3 class="animate-intro" >Vaša datoteka zaradi napake ni bila naložena.</h3>';
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $ime = basename( $_FILES["fileToUpload"]["name"]);

        $q = "UPDATE task SET datoteka = '{$ime}' WHERE idTask = {$_GET['idTask']}";
        $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

        echo '<h3 class="animate-intro">Datoteka '. $ime .' je bila naložena.</h3>';
    } else {
        echo '<h3 class="animate-intro" >Vaša datoteka zaradi napake ni bila naložena.</h3>';
    }
}

            echo'<br/>
            <div class="buttons">
                <a class="button stroke animate-intro" href="sprint.php?idSprint='. $_GET['idSprint'] .'" title="">Nazaj na stran Sprinta</a>
            </div>
            </div >
        </div >
    </section >
</div>';

include('includes/footer.php');