<?php
$host = "sql7.freesqldatabase.com";
$dbname = "sql7823249";
$username = "sql7823249";
$password = "PCAG4XI7E4";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(["erreur" => $e->getMessage()]);
    exit();
}
?>