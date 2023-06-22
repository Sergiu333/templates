<!DOCTYPE html>
<html>
<head>
    <title>Adăugare agent</title>
    <link rel="stylesheet" href="../styles/global.css">
</head>
<body class="background-default">
<h1>Adăugare agent</h1>
<button class="my-5"><a href="/apartamente/src" class="p-5">Inapoi</a></button>
<?php
// Verificare dacă formularul a fost trimis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificare dacă toate câmpurile au fost completate
    if (!empty($_POST["cod_agent"]) && !empty($_POST["nume"]) && !empty($_POST["prenume"]) && !empty($_POST["varsta"]) && !empty($_POST["telefon"])) {
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

        // Preluarea valorilor din formular
        $cod_agent = $_POST["cod_agent"];
        $nume = $_POST["nume"];
        $prenume = $_POST["prenume"];
        $varsta = $_POST["varsta"];
        $telefon = $_POST["telefon"];

        // Crearea și executarea interogării SQL pentru inserarea datelor
        $query = "INSERT INTO Agent (CodAgent, Nume, Prenume, Varsta, Telefon) VALUES ('$cod_agent', '$nume', '$prenume', '$varsta', '$telefon')";

        if ($conn->query($query) === TRUE) {
            echo "Agentul a fost adăugat cu succes.";
        } else {
            echo "A apărut o eroare la adăugarea agentului: " . $conn->error;
        }

        // Închiderea conexiunii
        $conn->close();
    } else {
        echo "Vă rugăm completați toate câmpurile.";
    }
}
?>

<form method="POST" class="flex flex-col gap-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="flex flex-col">
        <label for="cod_agent">Cod agent:</label>
        <input type="text" name="cod_agent" id="cod_agent" required>
    </div>

    <div class="flex flex-col">
        <label for="nume">Nume:</label>
        <input type="text" name="nume" id="nume" required>
    </div>

    <div class="flex flex-col">
        <label for="prenume">Prenume:</label>
        <input type="text" name="prenume" id="prenume" required>
    </div>

    <div class="flex flex-col">
        <label for="varsta">Vârsta:</label>
        <input type="text" name="varsta" id="varsta" required>
    </div>

    <div class="flex flex-col">
        <label for="telefon">Telefon:</label>
        <input type="text" name="telefon" id="telefon" required>
    </div>

    <input type="submit" value="Adaugă agent">
</form>
</body>
</html>
