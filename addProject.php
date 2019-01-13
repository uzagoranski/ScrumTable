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
                    $query = "SELECT idUporabnik, email, CONCAT(ime, ' ', priimek) AS name FROM uporabnik";
                    $r = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br />MySQL Error: " . mysqli_error($dbc));

                    $rowCount = mysqli_num_rows($r);

                    if (isset($_SESSION['ime'])) {

                        $idUporabnik = $_SESSION['idUporabnik'];

                        echo '<h1>Nov projekt</h1>
                        <h3 class="animate-intro">Dodajanje projekta še nikoli ni bilo lažje.</h3><br/>

                    <div class="buttons">
                        <form action="addProject.php" method="post">
                            <fieldset>
                                <input class="formal" style="width: 100%" type="text" name="naziv" placeholder="Vnesite naziv projekta"/>                                
                            </fieldset>
                            <input class="btn btn-primary" type="submit" name="submit" value="Dodaj projekt" />
                        </form>
                    </div>';

                    } else {
                        echo '<h1>Za dodajanje projekta morate biti prijavljeni.</h1> </br></br>';
                    }
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $trimmed = array_map('trim', $_POST);

                        // predvidevamo neveljavne podatke
                        $naziv = FALSE;

                        if ($trimmed['naziv'] !== null) {
                            $naziv = mysqli_real_escape_string($dbc, $trimmed['naziv']);
                        } else {
                            echo '<p class="error">Vnesite veljaven naziv!</p>';
                        }

                        if ($naziv) {

                            // vstavljanje novega oglasa v podatkovno bazo
                            $q = "INSERT INTO projekt (naziv, steviloSprintov) VALUES ('$naziv', '1')";
                            $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

                            if (mysqli_affected_rows($dbc) == 1) {

                                $q1 = "SELECT * FROM projekt WHERE naziv = '$naziv'";
                                $r1 = mysqli_query($dbc, $q1) or trigger_error("Query: $q1\n<br />MySQL Error: " . mysqli_error($dbc));

                                $results = mysqli_fetch_array ($r1, MYSQLI_ASSOC);

                                $q2 = "INSERT INTO uporabnikHasProjekt (idProjekt, idUporabnik) VALUES ('{$results['idProjekt']}', '$idUporabnik')";
                                $r2 = mysqli_query($dbc, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($dbc));

                                $sprint = "Sprint 1";

                                $q2 = "INSERT INTO sprint (naziv, idProjekt) VALUES ('$sprint', '{$results['idProjekt']}')";
                                $r2 = mysqli_query($dbc, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($dbc));

                                $url = BASE_URL . 'project.php?idProjekt=' . $results['idProjekt'];
                                header("Location: $url");
                                exit();

                            } else { // če je šlo kaj narobe
                                echo '<p class="error">Zaradi napake vnos projekta ni bil mogoč. Ponovite postopek.</p>';
                            }

                        } else { // če je prišlo do napake pri preverjanju registracijskih podatkov
                            echo '<p class="error">Napaka pri preverjanju vnosnih podatkov. Ponovite postopek.</p>';
                        }

                        mysqli_close($dbc);
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>

<?php include('includes/footer.php'); ?>