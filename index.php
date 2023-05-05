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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boite a surgestion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
   <form id="form" action="" method="POST" enctype="m
   ">
    <h1>Contactez-nous</h1>
    <div class="separation"></div>
    <div class="corps-formulaire">
        <div class="gauche">
        <div class="boite">
            <label>Votre faculté</label>
            <input type="text" id="name" name="name">
            <i class="fa-solid fa-user"></i>
            <small>message d'erreur</small>
        </div>
        <div class="boite">
            <label>Votre adresse e-mail</label>
            <input type="email" id="email" name="email">
            <i class="fa-solid fa-envelope"></i>
            <small>message d'erreur</small>
        </div>
        <div class="boite">
            <label>Votre telephone</label>
            <input type="number" id="numr" name="numr">
            <i class="fa-solid fa-mobile"></i>
            <small>message d'erreur</small>
        </div>
            
        </div>
        <div class="droite">
           <div class="boite">
            <label>Votre avis</label>
            <textarea id="message" name="message" placeholder="message....."></textarea>
           </div>
        </div>
    </div>

    <div class="pied-formulaire" align="center">
        <input type="submit" name="submit" id="submit" value="Envoyer le message">
    </div>
   </form>
   
   <!-- <script src="adin.js"></script> -->
 
</body>
</html>