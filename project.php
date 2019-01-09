<?php
$page_title = 'Projekt številka' . $_GET['idProjekt'];

require('includes/config.php');
include('includes/header.php');

require(MYSQL);
?>

    <div id="main-content-wrap">
        <section id="intro">
            <div class="row intro-content">
                <div class="col-twelve">
                    <?php
                    $query = "SELECT * FROM projekt WHERE idProjekt ={$_GET['idProjekt']}";
                    $r = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br />MySQL Error: " . mysqli_error($dbc));

                    if (isset($_SESSION['ime'])) {

                        $idUporabnik = $_SESSION['idUporabnik'];

                        $results = mysqli_fetch_array($r, MYSQLI_ASSOC);
                        echo '<h1> ' . $results['naziv'] . ' </h1>
                              <label>Izberite sodelujoče uporabnike pri projektu</label>';

                        echo '
                    <div class="buttons">
                        <form action="addProject.php" method="post">
                            <fieldset>
                            <select class="izberiUporabnika" style="width: 100%" multiple>';

                        $q1 = "SELECT idUporabnik, email, CONCAT(ime, ' ', priimek) AS name FROM uporabnik";
                        $r1 = mysqli_query($dbc, $q1) or trigger_error("Query: $q1\n<br />MySQL Error: " . mysqli_error($dbc));

                        $rowCount = mysqli_num_rows($r);

                        if ($rowCount > 0) {
                            while ($results = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
                                if ($results['idUporabnik'] != $idUporabnik) {
                                    echo '<option value="' . $results['idUporabnik'] . '">' . $results['name'] . ' (' . $results['email']. ')</option>';
                                }
                            }
                        } else {
                            echo '<option value="">Noben uporabnik ni na voljo</option>';
                        }
                        echo '
                                </select>
                            </fieldset>
                            <input class="btn btn-primary" type="submit" name="submit" value="Dodaj uporabnika/e" />
                        </form>
                    </div>';

                    } else {
                        echo '<h1>Za dodajanje uporabnikov na projekt morate biti prijavljeni.</h1> </br></br>';
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
                            $q = "INSERT INTO projekt (naziv) VALUES ('$naziv')";
                            $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

                            if (mysqli_affected_rows($dbc) == 1) {

                                $q = "SELECT * FROM projekt WHERE naziv = '$naziv'";
                                $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

                                while ($results = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo '<h3>Vnos projekta je bil uspešen!</h3>';
                                    $url = BASE_URL . 'project.php?idProjekt=' . $results['idProjekt'];
                                    header("Location: $url");
                                    exit();
                                }


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
        </section>
    </div>

<script>
    let selectedValues = jQuery('#multipleSelect').val();

</script>

<?php include('includes/footer.php'); ?>