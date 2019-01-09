<?php
$page_title = 'Avto.zag';

require('includes/config.php');
include('includes/header.php');

?>
<div id="main-content-wrap">
    <section id="intro">
        <div class="row intro-content">
            <div class="col-twelve">
                <h1 class="animate-intro">
                    Moji projekti
                </h1>
                <h3 class="animate-intro">Kontrolna plošča projektov, pri katerih sodelujete.</h3><br/>
            </div>
        </div>
    </section>
    <section id="styles">
        <div class="row add-bottom text-center">

            <div class="row">

                <div class="col-twelve">
                    <br/>
                    <div class="table-responsive">

                        <?php if (isset($_SESSION['ime'])) {

                            require(MYSQL);

                            $q1 = "SELECT * FROM uporabnikhasprojekt WHERE idUporabnik = {$_SESSION['idUporabnik']}";
                            $r1 = mysqli_query($dbc, $q1) or trigger_error("Query: $q1\n<br />MySQL Error: " . mysqli_error($dbc));

                            $num = mysqli_num_rows($r1);

                            if ($num > 0) {
                                echo '<table>
                                    <thead>
                                        <tr>
                                            <th>Naziv projekta</th>
                                            <th>Povezava</th>
                                            <th>Število Sprintov</th>
                                            <th>Število sodelujočih</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                                while ($row = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {

                                    $q2 = "SELECT * FROM projekt WHERE idProjekt = {$row['idProjekt']}";
                                    $r2 = mysqli_query($dbc, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($dbc));

                                    $query = "SELECT * FROM uporabnikhasprojekt WHERE idProjekt = {$row['idProjekt']}";
                                    $rq = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br />MySQL Error: " . mysqli_error($dbc));
                                    $steviloUdelezencev = mysqli_num_rows($rq);

                                    while ($results = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
                                        echo ' <tr>
                                               <td>'.$results['naziv'].'</td>
                                               <td><a href="/ScrumTable/project.php?idProjekt='.$results['idProjekt'].'" title="">Podrobnosti projekta</a></td>
                                               <td>'.$results['steviloSprintov'].'</td>
                                               <td>'.$steviloUdelezencev.'</td>
                                           </tr>';
                                    }
                                }
                                echo '</tbody></table>
                                    <a href="addProject.php" class="button button-primary">Nov projekt</a>';
                            } else {
                                echo '<p class="error">Niste dodali nobenega projekta.</p>';
                            }
                        } else {
                            echo '<h1>Za ogled vaših projektov se prijavite v sistem.</h1> </br></br>';
                        }
                        ?>
                    </div> <br/>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('includes/footer.php'); ?>