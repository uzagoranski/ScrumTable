<?php
$page_title = 'ScrumTable';

require('includes/config.php');
include('includes/header.php');

require(MYSQL);

$q = "SELECT * FROM vozilo ORDER BY idVozilo DESC LIMIT 4";
$r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

$num = mysqli_num_rows($r);

?>
    <div class="container indexpaddings">

        <header data-aos="fade-up"  class="jumbotron my-4">
           <?php echo '<h1>Pozdravljeni na spletni strani ScrumTable';
                if (isset($_SESSION['ime'])) {
                echo ", {$_SESSION['ime']}";
                }
                echo '!</h1>';
            ?>
            <br/>
            <p class="lead">Stran Avto.zag je namenjena prodaji in nakupu rabljenih in novih avtomobilov. Če želite vozilo prodati se prijavite
            v sistem, če pa želite avtomobil kupiti pa prijava ni potrebna. Obilo srečnih kilometrov vam želi, ekipa Avto.zag </p>
        </header>
        <br/>

        <h2 data-aos="fade-up">Najnovejši oglasi</h2>

        <div class="row text-center">

        <?php
        if ($num > 0) {
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

            $q3 = "SELECT * FROM znamka WHERE idZnamka = {$row['idZnamka']}";
            $r3 = mysqli_query($dbc, $q3) or trigger_error("Query: $q3\n<br />MySQL Error: " . mysqli_error($dbc));

            echo '
            <div data-aos="fade-up" class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                <div class="card">
                    <img src="data:image/jpeg;base64,'.base64_encode( $row['slika'] ).'"/>
                    <div class="card-body">
                        <h4 class="card-title">' . $row['naziv'] . '</h4>';
                        while ($results = mysqli_fetch_array ($r3, MYSQLI_ASSOC)) {
                            echo '<p>Znamka: ' . $results['znamka'] . '</p >';
        
                            $q4 = "SELECT * FROM model WHERE idModel = {$row['idModel']}";
                            $r4 = mysqli_query($dbc, $q4) or trigger_error("Query: $q4\n<br />MySQL Error: " . mysqli_error($dbc));
        
                            while ($rezultati = mysqli_fetch_array ($r4, MYSQLI_ASSOC)) {
                                echo '<p>Model: ' . $rezultati['model'] . ' </p >';
                            }
                        }
                        echo '
                        <p class="card-text">Prevoženi km.: ' . $row['prevozeniKilometri'] . ' km</p>
                        <p class="card-text">Gorivo: ' . $row['gorivo'] . '</p>
                        <p class="card-text">Moč motorja: ' . $row['mocMotorja'] . ' KM</p>
                        <p class="card-text">Menjalnik: ' . $row['menjalnik'] . '</p>
                        <p class="card-text">Letnik 1. registracije: ' . $row['letnik'] . '</p>
                        <h6 class="card-text">CENA: ' . $row['cena'] . ' €</h6>
                    </div>
                    <div class="card-footer">
                        <a href="item.php?idVozilo=' . $row['idVozilo'] . '" class="btn btn-primary">Več informacij</a>
                    </div>
                </div>
            </div>';
            }
            echo '<div class="col-lg-12 desno">
                <a data-aos="fade-up" href="list.php" class="btn btn-success btn-lg">Več oglasov</a>
            </div>';
        } else {

            echo '<p class="error">Trenutno ni objavljen noben oglas.</p>';

        }
        ?>
        </div>
        <br/>
    </div>

<?php include('includes/footer.php'); ?>