<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificați dacă a fost trimis un formular pentru salvare
    if (isset($_POST["salveaza"])) {
        $codAgent = $_POST["codAgent"];
        $nume = $_POST["nume"];
        $prenume = $_POST["prenume"];
        $varsta = $_POST["varsta"];
        $telefon = $_POST["telefon"];

        // Actualizați înregistrarea în baza de date
        $query_update = "UPDATE Agent SET Nume='$nume', Prenume='$prenume', Varsta='$varsta', Telefon='$telefon' WHERE CodAgent='$codAgent'";
        if ($conn->query($query_update) === TRUE) {
            echo "Datele au fost actualizate cu succes.";
        } else {
            echo "Eroare la actualizarea datelor: " . $conn->error;
        }
    }
}

// Închiderea conexiunii
$conn->close();
?>
