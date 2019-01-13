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

                    </h1>
                    <h3 class="animate-intro">Kontrolna plošča za task</h3><br/>
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

                                $q1 = "SELECT * FROM task WHERE idUporabnik = {$_SESSION['idUporabnik']}";
                                $r1 = mysqli_query($dbc, $q1) or trigger_error("Query: $q1\n<br />MySQL Error: " . mysqli_error($dbc));

                                $num = mysqli_num_rows($r1);

                                if ($num > 0) {
                                    echo '<table>
                                    <thead>
                                        <tr>
                                            <th>Naziv</th>
                                            <th>Utez</th>
                                            <th>Deadline: </th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                                    while ($row = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {

                                        $q2 = "SELECT * FROM task WHERE idTask = {$row['idTask']}";
                                        $r2 = mysqli_query($dbc, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($dbc));

                                        while ($results = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
                                            echo ' <tr>
                                               <td>'.$results['naziv'].'</td>
                                               <td>'.$results['obtezitev'].'</td>
                                               <td>'.$results['rok_taska'].'</td>
                                           </tr>';
                                        }
                                    }
                                    echo '</tbody></table>';
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