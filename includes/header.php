<?php 
session_start();

if (!isset($page_title)) {
    $page_title = 'ScrumTable';
}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>ScrumTable</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
     ================================================== -->
    <link rel="icon" type="image/png" href="favicon.png">

</head>

<body id="top">
<header class="main-header">

    <div class="logo">
        <a href="/ScrumTable">ScrumTable</a>
    </div>

    <a class="menu-toggle" href="#"><span>Menu</span></a>

</header>

<nav id="menu-nav-wrap">

    <h3>Navigacija</h3>
    <ul class="nav-list">

        <?php

        echo   '<li><a class="smoothscroll" href="#intro" title="">Domov</a></li>
        <li><a class="smoothscroll" href="#features" title="">O nas</a></li>';

        if (isset($_SESSION['ime'])) {

            echo '<li><a class="smoothscroll" href="/ScrumTable/addProject.php" title="">Dodaj projekt</a></li>
        <li><a class="smoothscroll" href="/ScrumTable/myProjects.php" title="">Moji projekti</a></li>
        <li><a class="smoothscroll" href="/ScrumTable/logout.php" title="">Odjava</a></li>
        </ul>';
        }
        else {
            echo '</ul>           
                <div class="action">
                    <a class="button" href="/ScrumTable/register.php">Registracija</a>
                </div>
                <div class="action">
                    <a class="button" href="/ScrumTable/login.php">Prijava</a>
                </div>';
        }
        ?>

</nav>