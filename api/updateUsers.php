<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$prenom = $data['prenom'];
$nom = $data['nom'];
$email = $data['email'];

$sql = "UPDATE users SET prenom = :prenom, nom = :nom, email = :email WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':prenom' => $prenom,
    ':nom' => $nom,
    ':email' => $email,
    ':id' => $id
]);

if ($stmt->rowCount() > 0) {
    echo json_encode(["message" => "Utilisateur modifié"]);
} else {
    echo json_encode(["message" => "Erreur"]);
}
?>