<?php
$page_title = 'Sprint';

require('includes/config.php');
include('includes/header.php');

require(MYSQL);

if (isset($_SESSION['ime'])) {

    $q = "SELECT * FROM sprint WHERE idSprint = {$_GET['idSprint']}";
    $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
    $results = mysqli_fetch_array ($r, MYSQLI_ASSOC);

    $query = "SELECT * FROM projekt WHERE idProjekt = {$results['idProjekt']}";
    $return = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br />MySQL Error: " . mysqli_error($dbc));
    $row = mysqli_fetch_array ($return, MYSQLI_ASSOC);

    echo '<section id="pricing">
        <div class="row section-intro animate-this">
            <div class="col-twelve with-bottom-line">

                <h2>' . $results['naziv'] . '</h2>

                <h4 class="lead">PROJEKT: ' . $row['naziv'] . '</h4>
                <p class="lead">Dodajajte taske v segment "To Do" in jih z miško premikajte po poljih.</p>

            </div>
        </div>

        <div class="row pricing-content">

            <div class="pricing-tables block-1-3  group">

                <div class="bgrid animate-this">

                    <div class="price-block primary" data-info="To Do">

                        <div class="top-part">


                        </div>

                        <div class="bottom-part">

                            ';

    $q1 = "SELECT * FROM task WHERE idSprint = {$_GET['idSprint']} AND stanje = 1";
    $r1 = mysqli_query($dbc, $q1) or trigger_error("Query: $q1\n<br />MySQL Error: " . mysqli_error($dbc));

    while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
        echo ' <div class="container">                                                        
                                                 <a href="/ScrumTable/task.php?idSprint=' . $_GET['idSprint'] . '" title="">' . $row1['naziv'] .  '</a>
                                                 </div>';

    }

    echo  '

                            <a href="addTask.php?idSprint='.$results['idSprint'].'" class="button large" href="">Nov Task</a>

                        </div>

                    </div>

                </div> 

                <div class="bgrid animate-this">

                    <div class="price-block primary" data-info="In Progress">

                        <div class="top-part">

                           

                        </div>

                        <div class="bottom-part">
                          
                                ';
    $q2 = "SELECT * FROM task WHERE idSprint = {$_GET['idSprint']} AND stanje = 2";
    $r2 = mysqli_query($dbc, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($dbc));

    while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
        echo ' <div class="container">                                                        
                                     <a href="/ScrumTable/task.php?idSprint=' . $_GET['idSprint'] . '" title="">' . $row2['naziv'] . '</a>
                                     </div>';

    }

    echo  '                 

                        </div>

                    </div>

                </div> 

                <div class="bgrid animate-this">

                    <div class="price-block primary" data-info="Done">

                        <div class="top-part">


                        </div>

                        <div class="bottom-part">

                           ';

    $q3 = "SELECT * FROM task WHERE idSprint = {$_GET['idSprint']} AND stanje = 3";
    $r3 = mysqli_query($dbc, $q3) or trigger_error("Query: $q3\n<br />MySQL Error: " . mysqli_error($dbc));

    while ($row3 = mysqli_fetch_array($r3, MYSQLI_ASSOC)) {
        echo ' <div class="container">                                                        
                                                                 <a href="/ScrumTable/task.php?idSprint=' . $_GET['idSprint'] . '" title="">' . $row3['naziv'] . '</a>
                                                                 </div>';

    }

    echo  '

      

                        </div>

                    </div>

                </div> 

            </div> 

        </div> 

    </section>';
} else {
    echo '<section id="pricing">
        <div class="row section-intro animate-this">
            <div class="col-twelve with-bottom-line">

                <h2>Niste prijavljeni</h2>

                <p class="lead">Za ogled podrobnosti Sprinta se prijavite v sistem</p>

            </div>
        </div>
    </section>';
}

include('includes/footer.php');