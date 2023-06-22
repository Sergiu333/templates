<!DOCTYPE html>
<html>
<head>
    <title>Editare agent</title>
    <link rel="stylesheet" href="../styles/global.css">

</head>
<body class="background-default">
<button class="my-5"><a href="/apartamente/src" class="p-5">Inapoi</a></button>
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

// Verificați dacă a fost furnizat parametrul CodAgent în URL
if (isset($_GET["CodAgent"])) {
    $codAgent = $_GET["CodAgent"];

    // Obțineți datele agenților bazate pe CodAgent
    $query_agent = "SELECT * FROM Agent WHERE CodAgent='$codAgent'";
    $result_agent = $conn->query($query_agent);

    if ($result_agent->num_rows > 0) {
        $row = $result_agent->fetch_assoc();
        $nume = $row["Nume"];
        $prenume = $row["Prenume"];
        $varsta = $row["Varsta"];
        $telefon = $row["Telefon"];

        // Afișați formularul de editare
        echo "
        <form method='POST' class='flex flex-col gap-3' action='editeaza_agent.php'>
            <h1>Editare Agent</h1>   
            <input type='hidden' name='codAgent' value='$codAgent'>
           
            <div class='flex flex-col'>
                <label for='nume'>Nume:</label>
                <input type='text' name='nume' value='$nume'>
            </div>
            
            <div class='flex flex-col'>
                <label for='prenume'>Prenume:</label>
                <input type='text' name='prenume' value='$prenume'>
            </div>
           
            <div class='flex flex-col'>
                <label for='varsta'>Vârsta:</label>
                <input type='text' name='varsta' value='$varsta'>
            </div>
           
            <div class='flex flex-col'>
                <label for='telefon'>Telefon:</label>
                <input type='text' name='telefon' value='$telefon'>
            </div>
           
            <input type='submit' name='salveaza' value='Salvează'>
        </form>
        ";
    } else {
        echo "Nu s-au găsit date pentru agentul specificat.";
    }
}

// Închiderea conexiunii
$conn->close();
?>
</body>
</html>
