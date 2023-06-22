<!DOCTYPE html>
<html>
<head>
    <title>Editare apartament</title>
    <link rel="stylesheet" href="../styles/global.css">
</head>
<body class="background-default">
<button class="my-5"><a href="/apartamente/src" class="p-5">Inapoi</a></button>
<?php
// Verificăm dacă s-a primit un CodApartament valid prin URL
if (isset($_GET['CodApartament'])) {
    $codApartament = $_GET['CodApartament'];

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

    // Obținerea datelor apartamentului specificat
    $query_apartament = "SELECT * FROM apartamente WHERE CodApartament = $codApartament";
    $result_apartament = $conn->query($query_apartament);

    if ($result_apartament->num_rows == 1) {
        $row = $result_apartament->fetch_assoc();

        // Afișăm formularul pentru editarea apartamentului
        echo "<h1>Editare apartament</h1>";
        echo "<form action='salveaza_apartament.php' method='post'>";
        echo "CodApartament: <input type='text' name='CodApartament' value='".$row["CodApartament"]."' readonly><br>";
        echo "Etaj: <input type='text' name='Etaj' value='".$row["Etaj"]."'><br>";
        echo "NrCamere: <input type='text' name='NrCamere' value='".$row["NrCamere"]."'><br>";
        echo "Pret: <input type='text' name='Pret' value='".$row["Pret"]."'><br>";
        echo "MetriPatrati: <input type='text' name='MetriPatrati' value='".$row["MetriPatrati"]."'><br>";
        echo "CodAgent: <input type='text' name='CodAgent' value='".$row["CodAgent"]."'><br>";
        echo "<input class='mt-5' type='submit' value='Salvează' style='cursor:pointer;'>";
        echo "</form>";
    } else {
        echo "Apartamentul nu există.";
    }

    // Închiderea conexiunii
    $conn->close();
} else {
    echo "Nu s-a specificat un CodApartament valid.";
}
?>
</body>
</html>
