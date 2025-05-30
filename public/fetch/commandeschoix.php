<?php
require_once "../../config/db_connect.php";
require_once "../../config/functions.php";

if (!empty($_POST['restaurant'])) {
    $restaurantId = intval($_POST['restaurant']);

    $reqRestaurant = $bdd->prepare('SELECT * FROM nos_restaurants WHERE Id_restaurants = :myidresto');
    $reqRestaurant->bindValue(":myidresto", $restaurantId);
    $reqRestaurant->execute();

    $existe = $reqRestaurant->fetch();

    if ($existe) {
        session_start();
        $_SESSION["restaurant"] = $restaurantId;
        echo "ok";
    } else {
        echo "Restaurant non trouvé ou inexistant !";
    }
}
