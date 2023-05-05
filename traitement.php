<?php
// Connexion à la base de données
$servername = "localhost";
$username = "spcom_userkonan";
$password = "RXAOSZX5GJBV";
$dbname = "spcom_konan";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifiez la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Récupérez les données soumises par le formulaire
if(isset($_POST['submit'])){
$name = $_POST["name"];
$email = $_POST["email"];
$numr = $_POST["numr"];
$message = $_POST["message"];


// Échapper les caractères spéciaux pour éviter les attaques par injection SQL
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$numr = mysqli_real_escape_string($conn, $numr);
$message = mysqli_real_escape_string($conn, $message);

// Créer une requête SQL pour insérer les données dans la table
$sql = "INSERT INTO suggestions (nom, email, numr, messages) VALUES ('$name', '$email', '$numr', '$message')";

// Exécuter la requête SQL
if (mysqli_query($conn, $sql)) {
echo "Le message a été envoyé avec succès";
} else {
echo "Une erreur est survenue lors de l'envoi du message : " . mysqli_error($conn);
}
}







// Fermer la connexion à la base de données
mysqli_close($conn);
?>
