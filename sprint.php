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
                <p class="lead">Opravila dodajate s klikom na gumb NOV TASK. Premikanje opravil med polji poteka preko Drag & Dropa. Eno opravilo lahko ima pripeto samo eno datoteko.</p>
            </div>
        </div>

        <div class="row pricing-content">
            <div class="pricing-tables block-1-3  group">
                <div class="bgrid animate-this">
                    <div class="price-block primary" data-info="To Do">
                        <div class="bottom-part">';

                        $q1 = "SELECT * FROM task WHERE idSprint = {$_GET['idSprint']} AND stanje = 1";
                        $r1 = mysqli_query($dbc, $q1) or trigger_error("Query: $q1\n<br />MySQL Error: " . mysqli_error($dbc));

                        while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {

                            $qt1 = "SELECT datediff(rok_taska, CURDATE()) AS cas FROM task WHERE idTask={$row1['idTask']}";
                            $rt1 = mysqli_query($dbc, $qt1) or trigger_error("Query: $qt1\n<br />MySQL Error: " . mysqli_error($dbc));

                            $preostaliCas1 = mysqli_fetch_array($rt1, MYSQLI_ASSOC);

                            echo '<div class="notranji">                                                        
                                        <h3 class="nazivTaska">' . $row1['naziv'] . ' <span class="obtezitev">' . $row1['obtezitev'] . '</span><span><a class="puscice" href="moveRight.php?idTask='. $row1['idTask'] .'&idSprint='.$_GET['idSprint'].'"> &#187;</a></span></h3>
                                        <h5 class="naslovi">Datum roka: <span class="noter">' . $row1['rok_taska'] . '</span></h5>
                                        <h5 class="naslovi">Do roka ostane: <span class="noter">' . $preostaliCas1['cas'] . ' dni</span></h5>
                                        <h5 class="naslovi">Opis: <span class="noter">' . $row1['opis'] . '</span></h5>
                                    </div>';
                        }

                    echo  '<a class="button large" href="addTask.php?idSprint='.$results['idSprint'].'">Dodaj Task</a>
                        </div>
                    </div>
                </div> 
                <div class="bgrid animate-this">
                    <div class="price-block primary" data-info="In Progress">                    
                        <div class="bottom-part">';

                        $q2 = "SELECT * FROM task WHERE idSprint = {$_GET['idSprint']} AND stanje = 2";
                        $r2 = mysqli_query($dbc, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($dbc));

                        while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {

                            $qt2 = "SELECT datediff(rok_taska, CURDATE()) AS cas FROM task WHERE idTask={$row2['idTask']}";
                            $rt2 = mysqli_query($dbc, $qt2) or trigger_error("Query: $qt2\n<br />MySQL Error: " . mysqli_error($dbc));

                            $preostaliCas2 = mysqli_fetch_array($rt2, MYSQLI_ASSOC);

                            echo '<div class="notranji">   
                                        <h3 class="nazivTaska"><span><a class="puscice" href="moveLeft.php?idTask='. $row2['idTask'] .'&idSprint='.$_GET['idSprint'].'">&#171; </a></span>' . $row2['naziv'] . ' <span class="obtezitev">' . $row2['obtezitev'] . '</span><span><a class="puscice" href="moveRight.php?idTask='. $row2['idTask'] .'&idSprint='.$_GET['idSprint'].'"> &#187;</a></span></h3>
                                        <h5 class="naslovi">Datum roka: <span class="noter">' . $row2['rok_taska'] . '</span></h5>
                                        <h5 class="naslovi">Do roka ostane: <span class="noter">' . $preostaliCas2['cas'] . ' dni</span></h5>
                                        <h5 class="naslovi">Opis: <span class="noter">' . $row2['opis'] . '</span></h5> 
                                  </div>';
                        }

                echo ' </div>
                    </div>
                </div> 
                <div class="bgrid animate-this">
                    <div class="price-block primary" data-info="Done">              
                        <div class="bottom-part">';

                        $q3 = "SELECT * FROM task WHERE idSprint = {$_GET['idSprint']} AND stanje = 3";
                        $r3 = mysqli_query($dbc, $q3) or trigger_error("Query: $q3\n<br />MySQL Error: " . mysqli_error($dbc));

                        while ($row3 = mysqli_fetch_array($r3, MYSQLI_ASSOC)) {

                            $qt3 = "SELECT datediff(rok_taska, CURDATE()) AS cas FROM task WHERE idTask={$row3['idTask']}";
                            $rt3 = mysqli_query($dbc, $qt3) or trigger_error("Query: $qt3\n<br />MySQL Error: " . mysqli_error($dbc));

                            $preostaliCas3 = mysqli_fetch_array($rt2, MYSQLI_ASSOC);

                            echo '<div class="notranji">                                                        
                                        <h3 class="nazivTaska"><span><a class="puscice" href="moveLeft.php?idTask='. $row3['idTask'] .'&idSprint='.$_GET['idSprint'].'">&#171; </a></span>' . $row3['naziv'] . ' <span class="obtezitev">' . $row3['obtezitev'] . '</span></h3>
                                        <h5 class="naslovi">Datum roka: <span class="noter">' . $row3['rok_taska'] . '</span></h5>
                                        <h5 class="naslovi">Do roka ostane: <span class="noter">' . $preostaliCas3['cas'] . ' dni</span></h5>
                                        <h5 class="naslovi">Opis: <span class="noter">' . $row3['opis'] . '</span></h5>';

                            if($row3['datoteka'] == null) {
                                echo'<form class="dodajanjeDatoteke" action="uploadFile.php?idTask='.$row3['idTask'].'&idSprint='.$_GET['idSprint'].'" method="post" enctype="multipart/form-data">
                                           <h5 class="naslovi">Dodaj datoteko (.ZIP): <span class="noter"><input type="file" name="fileToUpload" id="fileToUpload"></span></h5>
                                           <input type="submit" value="Potrdi" name="submit">
                                        </form>
                                  </div>';
                            } else {
                                echo'<form action="downloadFile.php" method="post" enctype="multipart/form-data">
                                           <h5 class="naslovi">Naziv pripete datoteke: <span class="dat">' . $row3['datoteka'] . '</span></h5>
                                           <input type="hidden" value="' . $row3['datoteka'] . '" name="imeDatoteke">
                                           <input type="hidden" value="' . $_GET['idSprint'] . '" name="idSprint">
                                           <input type="submit" value="Prenesi" name="submit">
                                        </form>
                                  </div>';
                            }
                        }

                echo '</div>
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