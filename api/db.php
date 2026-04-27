<?php
$host = "sql7.freesqldatabase.com";
$dbname = "sql7824567";
$username = "sql7824567";
$password = "7VWYgqaWmF";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(["erreur" => $e->getMessage()]);
    exit();
}
?>