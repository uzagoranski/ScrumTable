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
                    $query = "SELECT * FROM uporabnik";
                    $r = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br />MySQL Error: " . mysqli_error($dbc));

                    $rowCount = mysqli_num_rows($r);

                    if (isset($_SESSION['ime'])) {

                        $idUporabnik = $_SESSION['idUporabnik'];

                        echo '
                    <h1>
                        Dodajanje projekta
                    </h1>
                    <div class="buttons">
                        <form action="addProject.php" method="post">
                            <fieldset>
                                <input class="formal" style="width: 100%" type="text" name="naziv" maxlength="20" placeholder="Vnesite naziv projekta"/>
                                <option value="">Izberite sodelujoče</option>';
                        if ($rowCount > 0) {
                            while ($results = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                echo '<option value="' . $results['idUporabnik'] . '">' . $results['uporabnik'] . '</option>';
                            }
                        } else {
                            echo '<option value="">Noben uporabnik ni na voljo</option>';
                        }
                        echo '
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
                        $naziv = $uporabnik = FALSE;

                        if ($trimmed['naziv'] !== null) {
                            $naziv = mysqli_real_escape_string($dbc, $trimmed['naziv']);
                        } else {
                            echo '<p class="error">Vnesite veljaven naziv!</p>';
                        }

                        if ($trimmed['uporabnik'] !== null) {
                            $idUporabnik = mysqli_real_escape_string($dbc, $trimmed['uporabnik']);
                        } else {
                            echo '<p class="error">Znamka mora biti zapolnjena!</p>';
                        }

                        if ($naziv && $uporabnik) {

                            // vstavljanje novega oglasa v podatkovno bazo
                            $q = "INSERT INTO projekt (idUporabnik, naziv) VALUES ('$idUporabnik', '$naziv')";
                            $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

                            if (mysqli_affected_rows($dbc) == 1) {

                                echo '<h3>Vnos projekta je bil uspešen!</h3>';
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