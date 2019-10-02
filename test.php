<?php
$dbName = "manoProjektas";
$user = "root";
$password = "";
$vardas = $_REQUEST['vardas'];
$elpastas = $_REQUEST['elpastas']
$zinute = $_REQUEST['zinute'];
try {
    $db = new
    PDO('mysql:host=localhost;dbname='.$dbName.';charset=utf8mb4', $user,
        $password);
    $db->exec("INSERT INTO zinutes(vardas, elpastas, zinute)
VALUES('".$vardas."', '".$elpastas."', '".$zinute."')");
} catch(PDOException $ex) {
    echo "Kilo klaida! " . $ex->getMessage();
}<?php
