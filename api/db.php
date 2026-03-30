<?php
$host = "sql7.freesqldatabase.com";
$dbname = "sql7821663";
$username = "sql7821663";
$password = "eH2vyjHlEa";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(["erreur" => $e->getMessage()]);
    exit();
}
?>