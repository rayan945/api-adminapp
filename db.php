<?php
$host = "sql312.infinityfree.com";
$dbname = "if0_41434523_dbxyz";
$username = "if0_41434523";
$password = "focr9caoWcfh";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(["erreur" => $e->getMessage()]);
    exit();
}
?>