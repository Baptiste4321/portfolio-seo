<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Connectez-vous à la base de données
    $mysqli = new mysqli("localhost", "vm-admin", "hys48nfk14", "BD_connexion");

    if ($mysqli->connect_error) {
        die("Erreur de connexion à la base de données: " . $mysqli->connect_error);
    }

    // Préparez et exécutez la requête SQL pour insérer le nouveau profil
    $stmt = $mysqli->prepare("INSERT INTO contact (nom, email, telephone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $message);
    $stmt->execute();

    // Fermez la connexion et la déclaration
    $stmt->close();
    $mysqli->close();

    // Redirigez l'utilisateur vers une page de succès ou effectuez d'autres actions nécessaires
    header("Location: success_page.html");
    exit();
}
?>
