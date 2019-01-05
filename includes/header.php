<?php 
session_start();

if (!isset($page_title)) {
    $page_title = 'Avto.zag';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $page_title; ?></title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="styles/site.css">

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/AvtoZAG"><img class="logo" src="images/logo.png"/> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
<?php

echo   '<li class="nav-item">
            <a class="nav-link" href="/AvtoZAG">Domov<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/AvtoZAG/about.php">O nas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/AvtoZAG/list.php">Seznam vozil</a>
        </li>';

if (isset($_SESSION['ime'])) {

	echo '<li class="nav-item"><a class="nav-link" href="/AvtoZAG/addProject.php">Dodaj vozilo</a></li>
	    <li class="nav-item"><a class="nav-link" href="/AvtoZAG/posted.php?idUporabnik=' . $_SESSION['idUporabnik'] . '">Moji oglasi</a></li>
        <li class="nav-item"><a class="nav-link geslo" href="/AvtoZAG/changePassword.php">Spremeni geslo</a></li>
        <li class="nav-item"><a class="nav-link priodjava" href="/AvtoZAG/logout.php">Odjava</a></li>';
}
else {
	echo '<li class="nav-item"><a class="nav-link registracija" href="/AvtoZAG/register.php">Registracija</a></li>
	<li class="nav-item"><a class="nav-link priodjava" href="/AvtoZAG/login.php">Prijava</a></li>';
}
?>
                </ul>
            </div>
        </div>
    </nav>