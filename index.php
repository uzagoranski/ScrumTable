<?php
$page_title = 'ScrumTable';

require('includes/config.php');
include('includes/header.php');

?>

   <div id="main-content-wrap">
   	<section id="intro">
		   <div class="row intro-content">
		   	<div class="col-twelve">
		   		<h3 class="animate-intro">Lažje življenje s</h3>
					<h1 class="animate-intro">
						SCRUM TABLE
					</h1>
					<div class="buttons">
						<a class="button stroke smoothscroll animate-intro" href="#features" title="">Funkcionalnosti</a>
						<a class="button stroke smoothscroll animate-intro" href="#testimonials" title="">Mnenja uporabnikov</a>
					</div>
					<img src="images/app-screenshot-big.jpg" alt="" class="animate-intro">
            </div>
       </div>
    </section>

    <section id="features">
        <div class="row section-intro group animate-this">
            <div class="col-twelve with-bottom-line">
            <h2 class="">Funkcionalnosti.</h2>

            <p class="lead">Vse funkcionalnosti, ki vam jih nudimo.</p>
            </div>
        </div>

        <div class="row features-wrap">

            <div class="features-list block-1-3 block-s-1-2 block-tab-full">

                <div class="bgrid feature animate-this">

                    <span class="feature-count">01.</span>

                   <div class="feature-content">

                <h3>Dodajanje projektov</h3>

                        <p>
                            Funkcionalnost omogoča prijavljenim uporabnikom dodajanje novega projekta. S tem se bo ustvarila SCRUM tabla, kamor bo mogoče dodajati posamezne sprinte (iteracije), na sprinte pa bo uporabnik vezal taske (naloge).
                       </p>

                    </div>

                </div> <!-- /bgrid -->

                <div class="bgrid feature animate-this">

                    <span class="feature-count">02.</span>

                   <div class="feature-content">

                <h3>Dodajanje sprintov</h3>

                        <p>
                            Vezano na prvo funkcionalnost bo dodajanje sprintov omogočeno prijavljenim uporabnikom. Tipično bo tabla enega sprinta razdeljena na segmente »To-Do«, »In progress«, »Done«. Ko bo se stanje posameznega taska spremenilo, bo ga uporabnik lahko premaknil v naslednji segment.
                       </p>

                    </div>

                </div> <!-- /bgrid -->

                <div class="bgrid feature animate-this">

                    <span class="feature-count">03.</span>

                   <div class="feature-content">

                <h3>Dodajanje taskov</h3>

                        <p>
                           Po dodanem sprintu se bo stran razdelila na 3 segmente. Task se bo lahko dodal v segment "To Do", ko bo v procesu izdelave pa bo ga uporabnik lahko prestavil v "In Progress" segment. Vsi opravljeni taski bodo v segmentu "Done".
                        </p>

                    </div>

                </div> <!-- /bgrid -->

                <div class="bgrid feature animate-this">

                    <span class="feature-count">04.</span>

                   <div class="feature-content">

                <h3>Prijava in registracija</h3>

                        <p>
                            V tem segmentu se bo implementirala logika za registracijo in prijavo v sistem. Za registracijo bodo potrebni ime, priimek, e-mail, geslo ter uporabniško ime, za prijavo pa uporabniško ime in geslo. Po uspešni registraciji se bo na zapisan e-naslov poslal mail s potrditvijo registracije. Vsi podatki se bodo hranili v podatkovni bazi, administrator pa bo lahko uporabnike tudi brisal.
                       </p>

                    </div>

                </div> <!-- /bgrid -->

                <div class="bgrid feature animate-this">

                    <span class="feature-count">05.</span>

                   <div class="feature-content">

                <h3>Nastavitev "deadline-a" & obtežitev taskov</h3>

                        <p>
                            K vsakemu projektu bo možno dodajati druge uporabnike, ki sodelujejo pri delu v skupini. Vsakemu od dodanih uporabnikov bo omogočeno kreiranje taskov,  dodeljevanje taskov vsem sodelujočim uporabnikom, dodajanje rokov (angl. »deadline«) posameznega taska in obteževanje glede na časovno zahtevnost.
                       </p>

                    </div>

                </div> <!-- /bgrid -->

                <div class="bgrid feature animate-this">

                    <span class="feature-count">06.</span>

                   <div class="feature-content">

                <h3>Dodajanje datotek po končanem tasku</h3>

                        <p>
                            Ko bo uporabnik zaključil delo na posameznem tasku in ga prestavil v segment »Done«, mu bo omogočeno dodajanje dokumenta za lažje sledenje opravljenega dela. Po dodajanju dokumenta bo se le-ta shranil v podatkovno bazo kot BLOB datoteka. Do dokumentov bodo lahko dostopali vsi sodelujoči v sprintu, v katerem je bil dodan dokument.
                       </p>

                    </div>
                </div> <!-- /bgrid -->
            </div> <!-- /features-list -->
        </div> <!-- /features-wrap -->
    </section> <!-- /features -->

	
	   <!-- testimonials
   	================================================== -->
	   <section id="testimonials">
	   	<div class="row testimonial-content">
	   		<div class="col-twelve">

	   			<h2 class="h01 animate-this">
                  Kaj naše stranke pravijo o nas.
               </h2>

					<div id="testimonial-slider" class="flexslider animate-this">
						<ul class="slides">	
						   <li>
							  	<p>&ldquo;Inovacija na svojem področju.&rdquo;</p>
							  	<p class="author-info">&mdash; Marko Zemljarič</p>
							</li>						
							<li>
								<p>&ldquo;Rešujete življenja!&rdquo;</p>
								<p class="author-info">&mdash; Gašper Reher</p>
							</li>						
							<li>
							  	<p>&ldquo;Moja družina je veliko bolj vesela, zdaj, ko imam toliko časa za njih.&rdquo;</p>
							  	<p class="author-info">&mdash; Toni Haramija</p>
							</li>
						</ul>
					</div>

					<div class="flexslider-controls animate-this">
					   <ul class="flex-control-nav">
					      <li><img src="images/mare.jpg" alt=""></li>
					      <li><img src="images/reheru.jpg" alt=""></li>
					      <li><img src="images/tonski.jpg" alt=""></li>
					   </ul>
					</div>
						
	   		</div>
	   	</div>
	   </section> <!-- /testimonials -->



   </div> <!-- /main-content-wrap -->

<?php include('includes/footer.php'); ?>