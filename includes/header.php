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
    <meta charset="utf-8">
    <title>ScrumTable</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="styles/site.css">

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <link rel="icon" type="image/png" href="includes/favicon.png">

</head>

<body id="top">
<header class="main-header">

    <div class="logo">
        <a href="/ScrumTable">ScrumTable</a>
    </div>

    <a class="menu-toggle" href="#"><span>Menu</span></a>

</header>

<nav id="menu-nav-wrap">
    <h3>NAVIGACIJA</h3>
    <ul class="nav-list">

        <?php

        echo '<li><a href="/ScrumTable" title="">Domov</a></li>
        <li><a href="/ScrumTable/#features" title="">Funkcionalnosti</a></li>
        <li><a href="/ScrumTable/#testimonials" title="">Mnenja uporabnikov</a></li>';

        if (isset($_SESSION['ime'])) {
            echo '<li><a href="/ScrumTable/myProjects.php" title="">Moji projekti</a></li>
        </ul>
        <div class="action">
            <a class="button" href="/ScrumTable/addProject.php">Nov projekt</a>
        </div>
        <div class="action">
            <a class="button" href="/ScrumTable/logout.php">Odjava</a>
        </div>';
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