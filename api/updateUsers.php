<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept");
header("Content-Type: application/json; charset=utf-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include "db.php";

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$prenom = $data['prenom'];
$nom = $data['nom'];
$email = $data['email'];

$sql = "UPDATE users SET prenom = :prenom, nom = :nom, email = :email WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':prenom' => $prenom, ':nom' => $nom, ':email' => $email, ':id' => $id]);

if ($stmt->rowCount() > 0) {
    echo json_encode(["message" => "Utilisateur modifié"]);
} else {
    echo json_encode(["message" => "Erreur"]);
}
?>