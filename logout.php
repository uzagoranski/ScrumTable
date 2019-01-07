<?php
$page_title = 'Odjava';

require('includes/config.php');
include('includes/header.php');

if (!isset($_SESSION['ime'])) {

    $url = BASE_URL . 'index.php';
    ob_end_clean();
    header("Location: $url");
    exit();

} else {

    $_SESSION = array();
    session_destroy();
    setcookie (session_name(), '', time()-3600);

}

echo '
    <div id="main-content-wrap">
   	<section id="intro">
		   <div class="row intro-content">
		   	<div class="col-twelve">
		   		<h3 class="animate-intro">Bili ste odjavljeni iz strani ScrumTable.</h3>
					<h1 class="animate-intro">
						Hvala za obisk. 
					</h1>
					<div class="buttons">
						<a class="button stroke animate-intro" href="/ScrumTable/" title="">Vrni me domov</a>
						<a class="button stroke animate-intro" href="/ScrumTable/login.php" title="">Ponovna prijava</a>
					</div>
            </div>
       </div>
    </section>';

include('includes/footer.php');