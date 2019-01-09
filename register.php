<?php
$page_title = 'Registracija';

require('includes/config.php');
include('includes/header.php');
?>


    <div id="main-content-wrap">
        <section id="intro">
            <div class="row intro-content">
                <div class="col-twelve">
                    <h1>
                        Registracija uporabnika
                    </h1>
                    <div class="buttons">
                        <form action="register.php" method="post">
                            <fieldset>
                                <input class="formal" style="width: 100%" type="text" name="ime" maxlength="20" placeholder="Vnesite svoje ime" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" />
                                <input class="formal" style="width: 100%" type="text" name="priimek" maxlength="40" placeholder="Vnesite svoj priimek" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" />
                                <input class="formal" style="width: 100%" type="text" name="email" maxlength="60" placeholder="Vnesite svoj email" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>" />
                                <input class="formal" style="width: 100%" type="password" name="password1" maxlength="20" placeholder="Vnesite geslo" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>" />
                                <input class="formal" style="width: 100%" type="password" name="password2" maxlength="20" placeholder="Ponovite geslo" value="<?php if (isset($trimmed['password2'])) echo $trimmed['password2']; ?>" />
                            </fieldset>
                            <input class="btn btn-primary" type="submit" name="submit" value="Registriraj me" />
                        </form>
                    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // potrebna je povezava na PB
    require (MYSQL);

    // "trimamo" vse podatke
    $trimmed = array_map('trim', $_POST);

    // predvidevamo neveljavne podatke
    $ime = $priimek = $email = $geslo = FALSE;

    // preverjanje imena in po potrebi izpis napake
    if ($trimmed['ime'] !== null) {
        $ime = mysqli_real_escape_string ($dbc, $trimmed['ime']);
    } else {
        echo '<p class="error">Vnesite svoje ime!</p>';
    }

    // preverjanje priimka in po potrebi izpis napake
    if ($trimmed['priimek'] !== null) {
        $priimek = mysqli_real_escape_string ($dbc, $trimmed['priimek']);
    } else {
        echo '<p class="error">Vnesite svoj priimek!</p>';
    }

    // preverjanje e-maila in po potrebi izpis napake
    if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) {
        $email = mysqli_real_escape_string ($dbc, $trimmed['email']);
    } else {
        echo '<p class="error">Vnesite veljaven email!</p>';
    }

    // prevejanje gesla in primerjava z drugin vnosom gesla ter po potrebi izpis napake
    if (preg_match ('/^\w{4,20}$/', $trimmed['password1']) ) {
        if ($trimmed['password1'] == $trimmed['password2']) {
            $geslo = mysqli_real_escape_string ($dbc, $trimmed['password1']);
        } else {
            echo '<p class="error">Gesli se ne ujemata!</p>';
        }
    } else {
        echo '<p class="error">Vnesite veljavno geslo!</p>';
    }

    if ($ime && $priimek && $email && $geslo) { // če je vse OK

        // preverjanje ali je email še na voljo (ne sme biti že zaseden)
        $q = "SELECT idUporabnik FROM uporabnik WHERE email='$email'";
        $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

        if (mysqli_num_rows($r) == 0) { // e-mail je na voljo

            // vstavljanje novega uporabnika v PB
            $q = "INSERT INTO uporabnik (email, geslo, ime, priimek)
			VALUES ('$email', SHA1('$geslo'), '$ime', '$priimek')";
            $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

            if (mysqli_affected_rows($dbc) == 1) { // če je bilo vse OK

                echo '<h3>Registracija je bila uspešna!</h3>';
                exit(); // izvajanje se konča

            } else { // če je šlo kaj narobe
                echo '<p class="error">Zaradi napake prijava ni bila mogoča. Ponovite postopek.</p>';
            }

        } else { // če e-mail ni na voljo
            echo '<p class="error">Ta email je bil že uporabljen. Za registracijo uporabite drugi email.</p>';
        }

    } else { // če je prišlo do napake pri preverjanju registracijskih podatkov
        echo '<p class="error">Napaka pri preverjanju registracijskih podatkov. Ponovite postopek.</p>';
    }

    mysqli_close($dbc);

}
?>
</div>
</div>
</div>
</section>
<?php include('includes/footer.php'); ?>