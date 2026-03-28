<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include "db.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$users = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($users);
?>