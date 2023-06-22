<!DOCTYPE html>
<html>
<head>
    <title>Interfață tabel agenți</title>
    <link rel="stylesheet" href="../styles/global.css">
</head>
<body class="background-default">
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

// Obținerea datelor din tabela "Agent"
$query_agent = "SELECT * FROM Agent";
$result_agent = $conn->query($query_agent);

if ($result_agent->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>CodAgent</th><th>Nume</th><th>Prenume</th><th>Vârsta</th><th>Telefon</th></tr>";

    while ($row = $result_agent->fetch_assoc()) {
        echo "<tr class=\"hover-row\" onclick=\"window.location='agent/editeaza_agent.php?CodAgent=".$row["CodAgent"]."'\">";
        echo "<td>".$row["CodAgent"]."</td>";
        echo "<td>".$row["Nume"]."</td>";
        echo "<td>".$row["Prenume"]."</td>";
        echo "<td>".$row["Varsta"]."</td>";
        echo "<td>".$row["Telefon"]."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nu există date disponibile în tabela 'Agent'.";
}

// Închiderea conexiunii
$conn->close();
?>
</body>
</html>
