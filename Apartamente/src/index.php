<!DOCTYPE html>
<html>
<head>
    <title>Interfață tabel apartamente și Agent</title>
    <link rel="stylesheet" href="styles/global.css">

</head>
<body class="background-default">
<?php include 'Apartament/afisare_apartamente.php'; ?>
<a href="Apartament/adauga_apartament.php"><button class="my-5 w-full ">Adaugă apartament</button></a>

<h1>Agent</h1>
<?php include 'Agent/afisare_agenti.php'; ?>
<a href="Agent/adauga_agent.php"><button class="my-5 w-full ">Adaugă agent</button></a>

</body>
</html>
