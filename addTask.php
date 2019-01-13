<?php
$page_title = 'Dodajanje projekta';

require('includes/config.php');
include('includes/header.php');

require(MYSQL);
?>

    <div id="main-content-wrap">
        <section id="intro">
            <div class="row intro-content">
                <div class="col-twelve">
                    <?php

                    $idSprint = $_GET['idSprint'];
                    if (isset($_SESSION['ime'])) {

                    echo '<h1>Nov task</h1>
                        <h3 class="animate-intro">Stran za dodajanje novega taska.</h3><br/>

                    <div class="buttons">
                        <form action="addTask.php?idSprint='. $_GET['idSprint'].'" method="post">
                            <fieldset>
                                <input class="formal" style="width: 100%" type="text" name="naziv" placeholder="Vnesite naziv taska"/>                                
                            </fieldset>
                              <fieldset>
                                <input class="formal" style="width: 100%" type="text" name="opis" placeholder="Vnesite opis taska"/>                                
                            </fieldset>                     
                                <input class="formal" type="number" min="1" max="10" style="width: 100%" name="obtezitev" placeholder="Vnesite obtezitev"/>                                
                            <fieldset>
                                <input class="formal" type="date" style="width: 100%" name="rok_taska" placeholder="Vnesite deadline"/>                                
                            </fieldset>                                                                                                                                                                                                                                                                   
                            <input class="btn btn-primary" type="submit" name="submit" value="Dodaj task" />                            
                        </form>
                    </div>';

                    } else {
                        echo '<h1>Za dodajanje taska morate biti prijavljeni.</h1> </br></br>';
                    }
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $trimmed = array_map('trim', $_POST);

                        // predvidevamo neveljavne podatke
                        $naziv = FALSE;
                        $opis = FALSE;
                        $obtezitev = FALSE;
                        $rok_taska = FALSE;

                        if ($trimmed['naziv'] !== null) {
                            $naziv = mysqli_real_escape_string($dbc, $trimmed['naziv']);
                        } else {
                            echo '<p class="error">Vnesite veljaven naziv!</p>';
                        }
                        if ($trimmed['opis'] !== null) {
                            $opis = mysqli_real_escape_string($dbc, $trimmed['opis']);
                        } else {
                            echo '<p class="error">Vnesite veljaven opis!</p>';
                        }
                        if ($trimmed['obtezitev'] !== null) {
                            $obtezitev = mysqli_real_escape_string($dbc, $trimmed['obtezitev']);
                        } else {
                            echo '<p class="error">Vnesite obtezitev!</p>';
                        }
                        if ($trimmed['rok_taska'] !== null) {
                            $rok_taska = mysqli_real_escape_string($dbc, $trimmed['rok_taska']);
                        } else {
                            echo '<p class="error">Vnesite deadline!</p>';
                        }

                        if ($naziv&&$opis&&$obtezitev&&$rok_taska) {

                            // vstavljanje novega taska v podatkovno bazo
                            $q5 = "INSERT INTO task (naziv, opis, obtezitev, rok_taska, stanje, idSprint) VALUES ('$naziv', '$opis', '$obtezitev', '$rok_taska', '1', '{$_GET['idSprint']}')";
                            $r5 = mysqli_query($dbc, $q5) or trigger_error("Query: $q5\n<br />MySQL Error: " . mysqli_error($dbc));

                                $url = BASE_URL . 'sprint.php?idSprint=' . $idSprint;
                                header("Location: $url");
                                exit();

                            } else { // če je šlo kaj narobe
                                echo '<p class="error">Zaradi napake vnos taska ni bil mogoč. Ponovite postopek.</p>';
                            }

                        } else { // če je prišlo do napake pri preverjanju  podatkov
                            echo '<p class="error">Napaka pri preverjanju vnosnih podatkov. Ponovite postopek.</p>';
                        }

                        mysqli_close($dbc);?>


                </div>
            </div>
    </div>
    </section>

<?php include('includes/footer.php'); ?>