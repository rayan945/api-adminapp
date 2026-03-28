<?php
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