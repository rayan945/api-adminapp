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
$prenom = $data['prenom'];
$nom = $data['nom'];
$email = $data['email'];
$mdp = password_hash($data['mdp'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (prenom, nom, email, mdp) VALUES (:prenom, :nom, :email, :mdp)";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':prenom' => $prenom,
    ':nom' => $nom,
    ':email' => $email,
    ':mdp' => $mdp
]);

if ($stmt->rowCount() > 0) {
    echo json_encode(["message" => "Utilisateur ajouté"]);
} else {
    echo json_encode(["message" => "Erreur"]);
}
?>
