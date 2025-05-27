<?php
require_once "../../config/db_connect.php";
require_once "../../config/functions.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['mail']) && !empty($data['mdp'])) {
    $mail = htmlspecialchars($data['mail']);
    $mdp = htmlspecialchars($data['mdp']);

    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

        $reqAccount = $bdd->prepare('SELECT * FROM utilisateur WHERE mail = :myemail');
        $reqAccount->bindValue("myemail", $mail);
        $reqAccount->execute();

        $existeAccount = $reqAccount->fetch();

        if ($existeAccount) {
            if (password_verify($mdp, $existeAccount['mdp'])) {
                session_start();
                $_SESSION['auth'] = $mail;
                echo json_encode(["status" => "success", "message" => "Connexion réussie !"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Adresse mail et/ou mot de passe incorrect !"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Adresse mail et/ou mot de passe incorrect !"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Veuillez entrer une adresse mail valide !"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Veuillez remplir les champs vides !"]);
}
