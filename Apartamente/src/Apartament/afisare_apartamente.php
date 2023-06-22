<!DOCTYPE html>
<html>
<head>
    <title>Interfață tabel apartamente</title>
    <link rel="stylesheet" href="../styles/global.css">
</head>
<body>
<h1 class="color-[#fff]">Apartamente</h1>
<?php
// Conectarea la baza de date
$servername = "localhost";
$username = "root";
$password = "";
$database = "Apartamente";

$conn = new mysqli($servername, $username, $password, $database);

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Conexiunea la baza de date a esuat: " . $conn->connect_error);
}

// Obținerea datelor din tabela "apartamente"
$query_apartamente = "SELECT * FROM apartamente";
$result_apartamente = $conn->query($query_apartamente);

if ($result_apartamente->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>CodApartament</th><th>Etaj</th><th>NrCamere</th><th>Pret</th><th>MetriPatrati</th><th>CodAgent</th></tr>";

    while ($row = $result_apartamente->fetch_assoc()) {
        echo "<tr class=\"hover-row\" onclick=\"window.location='apartament/editeaza_apartament.php?CodApartament=".$row["CodApartament"]."'\">";
        echo "<td>".$row["CodApartament"]."</td>";
        echo "<td>".$row["Etaj"]."</td>";
        echo "<td>".$row["NrCamere"]."</td>";
        echo "<td>".$row["Pret"]."</td>";
        echo "<td>".$row["MetriPatrati"]."</td>";
        echo "<td>".$row["CodAgent"]."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nu există date disponibile în tabela 'apartamente'.";
}

// Închiderea conexiunii
$conn->close();
?>
</body>
</html>
