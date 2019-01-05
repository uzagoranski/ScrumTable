<?php
$page_title = 'Dodajanje projekta';

require('includes/config.php');
include('includes/header.php');

require(MYSQL);

$query = "SELECT * FROM znamka WHERE status=1 ORDER BY znamka ASC";
$r = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br />MySQL Error: " . mysqli_error($dbc));


$rowCount = mysqli_num_rows($r);

if (isset($_SESSION['ime'])) {

    $idUporabnik = $_SESSION['idUporabnik'];

    echo '<div class="container formal">
        <div class="row">
            <div class="col-md-12">
                <h1>Dodajanje oglasa</h1> </br></br>
                <form action="addProject.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <p><label>Naziv:</label> <input type="text" name="naziv" size="50" maxlength="60"/></p>   
                        <p><label>Cena (€):</label> <input type="text" name="cena" size="50" maxlength="60" /></p>               
                        <p><label>Znamka:</label> <select id="znamka" name="znamka">
                            <option value="">Izberite znamko</option>';
                            if($rowCount > 0){
                                while($results = mysqli_fetch_array ($r, MYSQLI_ASSOC)){
                                    echo '<option value="'.$results['idZnamka'].'">'.$results['znamka'].'</option>';
                                }
                            }else{
                                echo '<option value="">Nobena znamka ni na voljo</option>';
                            }
                        echo '</select></p>
                        
                        <p><label>Model:</label> <select id="model" name="model">
                            <option value="">Najprej izberite znamko</option>
                        </select><p/>
                        <p><label>Letnik 1. reg.:</label> <input type="text" name="letnik" size="50" maxlength="60" /></p>                  
                        <p><label>Gorivo:</label> 
                            <select id="gorivo" name="gorivo">
                                <option value="">Izberite gorivo</option>
                                <option value="Bencin">Bencin</option>
                                <option value="Diesel">Diesel</option>
                            </select>
                        </p>                  
                        <p><label>Menjalnik:</label> 
                            <select id="menjalnik" name="menjalnik">
                                <option value="">Izberite menjalnik</option>
                                <option value="Ročni">Ročni</option>
                                <option value="Avtomatski">Avtomatski</option>
                            </select>
                        </p>                  
                        <p><label>Moč motorja (KM):</label> <input type="text" name="mocMotorja" size="50" maxlength="60" /></p>                  
                        <p><label>Prostornina motorja (ccm):</label> <input type="text" name="prostorninaMotorja" size="50" maxlength="60" /></p>   
                        <p><label>Prevoženi kilometri (km):</label> <input type="text" name="prevozeniKM" size="50" maxlength="60" /></p>
                        <p><label>Barva:</label> 
                            <select id="barva" name="barva">
                                <option value="">Izberite barvo</option>
                                <option value="Bela">Bela</option>
                                <option value="Črna">Črna</option>
                                <option value="Rdeča">Rdeča</option>
                                <option value="Modra">Modra</option>
                                <option value="Zelena">Zelena</option>
                                <option value="Rumena">Rumena</option>
                                <option value="Siva">Siva</option>
                                <option value="Srebrna">Srebrna</option>
                                <option value="Zlata">Zlata</option>
                            </select>   
                        <p><label>Dodaj fotografijo:</label> <input type="file" name="slika" size="50"/></p>        
                        <div><input class="btn btn-primary" type="submit" name="submit" value="Dodaj oglas" /></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>';
} else {
    echo '<div class="container paddings">
    <div class="row">
        <div class="col-md-12">
            <h1>Za dodajanje oglasa morate biti prijavljeni.</h1> </br></br>
        </div>
    </div>';
}
?>

<div class="container">
<div class="row">
<div class="col-md-12">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $trimmed = array_map('trim', $_POST);

    // predvidevamo neveljavne podatke
    $naziv = $cena = $znamka = $model = $letnik = $gorivo = $menjalnik = $mocMotorja = $prostorninaMotorja = $prevozeniKM = $barva = $slika = FALSE;

    if ($trimmed['naziv'] !== null) {
        $naziv = mysqli_real_escape_string ($dbc, $trimmed['naziv']);
    } else {
        echo '<p class="error">Vnesite veljaven naziv!</p>';
    }

    if ($trimmed['cena'] !== null) {
        $cena = mysqli_real_escape_string ($dbc, $trimmed['cena']);
    } else {
        echo '<p class="error">Vnesite veljavno ceno!</p>';
    }

    if ($trimmed['znamka'] !== null) {
        $znamka = mysqli_real_escape_string ($dbc, $trimmed['znamka']);
    } else {
        echo '<p class="error">Znamka mora biti zapolnjena!</p>';
    }

    if ($trimmed['model'] !== null) {
        $model = mysqli_real_escape_string ($dbc, $trimmed['model']);
    } else {
        echo '<p class="error">Model mora biti zapolnjen!</p>';
    }

    if ($trimmed['letnik'] !== null) {
        $letnik = mysqli_real_escape_string ($dbc, $trimmed['letnik']);
    } else {
        echo '<p class="error">Neveljaven letnik!</p>';
    }

    if ($trimmed['gorivo'] !== null) {
        $gorivo = mysqli_real_escape_string ($dbc, $trimmed['gorivo']);
    } else {
        echo '<p class="error">Neveljavno gorivo!</p>';
    }

    if ($trimmed['menjalnik'] !== null) {
        $menjalnik = mysqli_real_escape_string ($dbc, $trimmed['menjalnik']);
    } else {
        echo '<p class="error">Neveljaven menjalnik!</p>';
    }

    if ($trimmed['barva'] !== null) {
        $barva = mysqli_real_escape_string ($dbc, $trimmed['barva']);
    } else {
        echo '<p class="error">Neveljavna barva!</p>';
    }

    if ($trimmed['mocMotorja'] !== null) {
        $mocMotorja = mysqli_real_escape_string ($dbc, $trimmed['mocMotorja']);
    } else {
        echo '<p class="error">Neveljaven vnos za moč motorja</p>';
    }

    if ($trimmed['prostorninaMotorja'] !== null) {
        $prostorninaMotorja = mysqli_real_escape_string ($dbc, $trimmed['prostorninaMotorja']);
    } else {
        echo '<p class="error">Neveljaven vnos za prostornino motorja</p>';
    }

    if ($trimmed['prevozeniKM'] !== null) {
        $prevozeniKM = mysqli_real_escape_string ($dbc, $trimmed['prevozeniKM']);
    } else {
        echo '<p class="error">Neveljaven vnos za prevožene kilometre</p>';
    }

    $check = getimagesize($_FILES['slika']['tmp_name']);
    if($check !== false) {
        $slika = addslashes(file_get_contents($_FILES['slika']['tmp_name']));
    } else {
        echo '<p class="error">Neveljavna slika</p>';
    }

    if ($naziv && $cena && $znamka && $model && $letnik && $gorivo && $menjalnik && $mocMotorja && $prostorninaMotorja && $prevozeniKM && $barva) {

        // vstavljanje novega oglasa v podatkovno bazo
        $q = "INSERT INTO vozilo (idUporabnik, naziv, cena, idZnamka, idModel, letnik, gorivo, menjalnik, mocMotorja, prostorninaMotorja, prevozeniKilometri, barva, slika)
        VALUES ('$idUporabnik', '$naziv', '$cena', '$znamka', '$model', '$letnik', '$gorivo', '$menjalnik', '$mocMotorja', '$prostorninaMotorja', '$prevozeniKM', '$barva', '$slika')";
        $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

        if (mysqli_affected_rows($dbc) == 1) {

            echo '<h3>Vnos oglasa je bil uspešen!</h3>';
            exit();

        } else { // če je šlo kaj narobe
            echo '<p class="error">Zaradi napake vnos oglasa ni bil mogoč. Ponovite postopek.</p>';
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

<?php include('includes/footer.php'); ?>