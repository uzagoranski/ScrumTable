<?php
$page_title = 'Projekt številka' . $_GET['idProjekt'];

require('includes/config.php');
include('includes/header.php');

require(MYSQL);

if (isset($_SESSION['ime'])) {

    $q1 = "SELECT * FROM projekt WHERE idProjekt = {$_GET['idProjekt']}";
    $r1 = mysqli_query($dbc, $q1) or trigger_error("Query: $q1\n<br />MySQL Error: " . mysqli_error($dbc));

    $results = mysqli_fetch_array($r1, MYSQLI_ASSOC);
    echo '<div id = "main-content-wrap" >
        <section id = "intro" >
            <div class="row intro-content" >
                <div class="col-twelve" >
                    <h1 class="animate-intro" > ' . $results['naziv'] . '</h1 >
                    <h3 class="animate-intro" >Dodajte uporabnike, preglejte sodelujoče ali uredite sprint.</h3 >
                    <br/>
                </div > 
            </div > 
        </section > 
        <section id = "styles" >
            <div class="row add-bottom text-center" >
                <div class="row" >
                    <div class="col-twelve" >
                    <br/>
                    <h1>VSI SPRINTI</h1>
                        <div class="table-responsive" >';
                        $q2 = "SELECT * FROM sprint WHERE idProjekt = {$_GET['idProjekt']}";
                        $r2 = mysqli_query($dbc, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($dbc));

                        $num = mysqli_num_rows($r2);

                        if ($num > 0) {
                            echo '<table>
                                    <thead>
                                        <tr>
                                            <th>Naziv Sprinta</th>
                                            <th>Povezava</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                            while ($row = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
                                echo '<tr id="dodajanje">
                                   <td>' . $row['naziv'] . '</td>
                                   <td><a href="/ScrumTable/sprint.php?idSprint=' . $row['idSprint'] . '" title="">Podrobnosti Sprinta</a></td>
                                </tr>';
                            }
                            echo '</tbody></table></div>
                            <form method="post" action="addSprint.php?idProjekt=' . $_GET['idProjekt'] . '">
                                <button class="button button-primary">Dodaj Sprint</button>
                            </form>';
                        } else {
                            echo '<p class="error">Niste dodali nobenega Sprinta.</p>';
                        }
                    echo '</div>
                </div>
            </div>
        </section>
                        
        <section id = "styles" >
            <div class="row add-bottom text-center" >
                <div class="row" >
                    <div class="col-twelve" >
                    <br/>
                    <h1>SODELUJOČI UPORABNIKI</h1>
                        <div class="table-responsive" >';

        $q3 = "SELECT * FROM uporabnikhasprojekt WHERE idProjekt={$_GET['idProjekt']}";
        $r3 = mysqli_query($dbc, $q3) or trigger_error("Query: $q3\n<br />MySQL Error: " . mysqli_error($dbc));

            echo '<table>
                    <thead>
                        <tr>
                            <th>Ime uporabnika</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                <tbody>';

        while ($vrsta = mysqli_fetch_array($r3, MYSQLI_ASSOC)) {
            $q4 = "SELECT idUporabnik, email, CONCAT(ime, ' ', priimek) AS name FROM uporabnik WHERE idUporabnik={$vrsta['idUporabnik']}";
            $r4 = mysqli_query($dbc, $q4) or trigger_error("Query: $q4\n<br />MySQL Error: " . mysqli_error($dbc));

            $vrstica = mysqli_fetch_array($r4, MYSQLI_ASSOC);

            echo ' <tr>
               <td>' . $vrstica['name'] . '</td>
               <td>' . $vrstica['email'] . '</td>
            </tr>';
        }
        echo '</tbody></table></div>
        
        <label>Izberite uporabnike iz seznama in jih s klikom na gumb "Dodaj uporabnika/e" povabite k sodelovanju.</label>
                
        <form action="addUser.php?idProjekt='.$_GET['idProjekt'].'" method="post">
            <fieldset>
                <select name="uporabniki[]" class="izberiUporabnika" style="width: 100%" multiple>';

                $qu = "SELECT idUporabnik, email, CONCAT(ime, ' ', priimek) AS name FROM uporabnik WHERE idUporabnik != (SELECT idUporabnik FROM uporabnikhasprojekt WHERE idProjekt={$_GET['idProjekt']})";
                $ru = mysqli_query($dbc, $qu) or trigger_error("Query: $qu\n<br />MySQL Error: " . mysqli_error($dbc));

                $stVrstic = mysqli_num_rows($ru);

                if ($stVrstic > 0) {
                    while ($results = mysqli_fetch_array($ru, MYSQLI_ASSOC)) {
                        echo '<option value="' . $results['idUporabnik'] . '">' . $results['name'] . ' (' . $results['email'] . ')</option>';
                    }
                } else {
                    echo '<option value="">Noben uporabnik ni na voljo.</option>';
                }

            echo '</select>
            </fieldset>
            <input class="button button-primary" type="submit" name="submit" value="Dodaj uporabnika/e" />
        </form>
        </div>
        </div>
    </section>
</div>';

} else {
    echo '<h1>Za ogled podrobnosti projekta se prijavite v sistem.</h1> </div>
            </div>
        </div>
    </section>
</div></br></br>';
}
include('includes/footer.php');