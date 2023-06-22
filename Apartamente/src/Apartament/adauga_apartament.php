<!DOCTYPE html>
<html>
<head>
    <title>Adăugare apartament</title>
    <link rel="stylesheet" href="../styles/global.css">
</head>
<body class="background-default">
<h1>Adăugare apartament</h1>
<button class="my-5"><a href="/apartamente/src" class="p-5">Inapoi</a></button>
<?php
// Verificare dacă formularul a fost trimis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificare dacă toate câmpurile au fost completate
    if (!empty($_POST["cod_apartament"]) && !empty($_POST["etaj"]) && !empty($_POST["nr_camere"]) && !empty($_POST["pret"]) && !empty($_POST["metri_patrati"]) && !empty($_POST["cod_agent"])) {
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
        $cod_apartament = $_POST["cod_apartament"];
        $etaj = $_POST["etaj"];
        $nr_camere = $_POST["nr_camere"];
        $pret = $_POST["pret"];
        $metri_patrati = $_POST["metri_patrati"];
        $cod_agent = $_POST["cod_agent"];

        // Crearea și executarea interogării SQL pentru inserarea datelor
        $query = "INSERT INTO apartamente (CodApartament, Etaj, NrCamere, Pret, MetriPatrati, CodAgent) VALUES ('$cod_apartament', '$etaj', '$nr_camere', '$pret', '$metri_patrati', '$cod_agent')";

        if ($conn->query($query) === TRUE) {
            echo "Apartamentul a fost adăugat cu succes.";
        } else {
            echo "A apărut o eroare la adăugarea apartamentului: " . $conn->error;
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
        <label for="cod_apartament">Cod apartament:</label>
        <input type="text"  name="cod_apartament" id="cod_apartament" required>
    </div>

    <div class="flex flex-col">
        <label for="etaj">Etaj:</label>
        <input type="text" name="etaj" id="etaj" required>
    </div>

    <div class="flex flex-col">
        <label for="nr_camere">Număr camere:</label>
        <input type="text" name="nr_camere" id="nr_camere" required>
    </div>

    <div class="flex flex-col">
        <label for="pret">Preț:</label>
        <input type="text" name="pret" id="pret" required>
    </div>

    <div class="flex flex-col">
        <label for="metri_patrati">Metri pătrați:</label>
        <input type="text" name="metri_patrati" id="metri_patrati" required>
    </div>

    <div class="flex flex-col">
        <label for="cod_agent">Cod agent:</label>
        <input type="text" name="cod_agent" id="cod_agent" required>
    </div>

    <input type="submit" value="Adaugă apartament" style="cursor: pointer">
</form>
</body>
</html>
