<?php
$page_title = 'Prijava';

require('includes/config.php');
include('includes/header.php');

?>

    <div class="container formal">
        <div class="row">
            <div class="col-md-12">
                <h1 data-aos="fade-up" >Prijava uporabnika</h1> </br></br>
                <form action="login.php" method="post">
                    <fieldset>
                        <p data-aos="fade-up" ><label>Email:</label> <input type="text" name="email" size="20" maxlength="60" /></p>
                        <p data-aos="fade-up" ><label>Geslo:</label> <input type="password" name="geslo" size="30" maxlength="30" /></p>
                        </br>
                        <div data-aos="fade-up" ><input class="btn btn-primary" type="submit" name="submit" value="Prijava" /></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require (MYSQL);

    // preverjanje e-maila
    if (!empty($_POST['email'])) {
        $e = mysqli_real_escape_string ($dbc, $_POST['email']);
    } else {
        $e = FALSE;
        echo '<p class="error">Vnesite email!</p>';
    }

    // preverjanje gesla
    if (!empty($_POST['geslo'])) {
        $p = mysqli_real_escape_string ($dbc, $_POST['geslo']);
    } else {
        $p = FALSE;
        echo '<p class="error">Vnesite geslo!</p>';
    }

    if ($e && $p) {

        // SQL za povpraševanje po uporabniku v PB
        $q = "SELECT * FROM uporabnik WHERE (email='$e' AND geslo=SHA1('$p'))";
        $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

        if (@mysqli_num_rows($r) == 1) { // če tak uporabnik obstaja

            // shranjevanje podatkov v sejo
            $_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC);
            mysqli_free_result($r);
            mysqli_close($dbc);

            // preusmeritev na začetno stran
            $url = BASE_URL . 'index.php';
            ob_end_clean(); // brisanje napak
            header("Location: $url");
            exit();

        } else { // če uporabnik ni najden
            echo '<p class="error">Geslo ali email nista pravilna. Ponovite postopek prijave</p>';
        }

    } else { // če je prišlo do napake
        echo '<p class="error">Prišlo je do napake. Ponovite postopek prijave.</p>';
    }

    mysqli_close($dbc);

}
?>

<?php include('includes/footer.php'); ?>