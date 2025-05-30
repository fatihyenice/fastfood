<?php
require_once "../../config/db_connect.php";
require_once "../../config/functions.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['nom']) && !empty($data['prenom']) && !empty($data['email']) && !empty($data['password']) && !empty($data['confirmPassword'])) {
    if (preg_match("/^[\p{L} '-]+$/u", $data['nom'])) {
        if (preg_match("/^[\p{L} '-]+$/u", $data['prenom'])) {
            if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $data['password'])) {
                    if ($data['password'] == $data['confirmPassword']) {

                        $stmt = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = :email");
                        $stmt->execute(['email' => $data['email']]);
                        if (!$stmt->fetch()) {
                            $reqInsert = $bdd->prepare('INSERT INTO utilisateur(nom,prenom,mail,mdp) VALUES(:nom,:prenom,:mail,:mdp)');
                            $reqInsert->bindValue(":nom", hsc($data['nom']));
                            $reqInsert->bindValue(":prenom", hsc($data['prenom']));
                            $reqInsert->bindValue(":mail", hsc($data['email']));
                            $reqInsert->bindValue(":mdp", password_hash($data['password'], PASSWORD_DEFAULT));
                            $reqInsert->execute();
                            echo json_encode(["status" => "success", "message" => "Votre inscription à bien été validé !"]);
                        } else {
                            echo json_encode(["status" => "error", "message" => "Cet email est déjà utilisé."]);
                        }
                    } else {
                        echo json_encode(["status" => "error", "message" => "Les mots de passe ne correspondent pas."]);
                    }
                } else {
                    echo json_encode(["status" => "error", "message" => "Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule et un chiffre."]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "L'adresse email n'est pas valide."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Le prénom contient des caractères non valides."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Le nom contient des caractères non-autorisés !"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Veuillez remplir les champs vides !"]);
}
