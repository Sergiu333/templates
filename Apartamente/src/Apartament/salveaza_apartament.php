<?php
// Verificăm dacă s-au primit date valide prin metoda POST
if (isset($_POST['CodApartament']) && isset($_POST['Etaj']) && isset($_POST['NrCamere']) && isset($_POST['Pret']) && isset($_POST['MetriPatrati']) && isset($_POST['CodAgent'])) {
    $codApartament = $_POST['CodApartament'];
    $etaj = $_POST['Etaj'];
    $nrCamere = $_POST['NrCamere'];
    $pret = $_POST['Pret'];
    $metriPatrati = $_POST['MetriPatrati'];
    $codAgent = $_POST['CodAgent'];

    // Conectarea la baza de date
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Apartamente";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificarea conexiunii
    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    // Actualizarea datelor apartamentului în baza de date
    $query_update = "UPDATE apartamente SET Etaj = '$etaj', NrCamere = '$nrCamere', Pret = '$pret', MetriPatrati = '$metriPatrati', CodAgent = '$codAgent' WHERE CodApartament = $codApartament";
    if ($conn->query($query_update) === TRUE) {
        echo "<div>
                <button><a href='/apartamente/src/'>Inapoi</a></button>
                <div>Datele apartamentului au fost actualizate cu succes.</div>
              </div>";
    } else {
        echo "Actualizarea datelor a eșuat: " . $conn->error;
    }

    // Închiderea conexiunii
    $conn->close();
} else {
    echo "Nu s-au primit date valide.";
}
?>
