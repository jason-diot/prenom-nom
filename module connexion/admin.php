<?php
session_start();

// Vérifier si l'utilisateur est connecté en tant qu'admin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["login"] !== "admin") {
    header("Location: connexion.php");
    exit;
}

// Récupérer toutes les informations des utilisateurs depuis la base de données
// Code de récupération des informations à ajouter ici

// Afficher les informations des utilisateurs dans un tableau
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administration</title>
</head>
<body>
    <h1>Administration</h1>
    <table>
        <tr>
            <th>Login</th>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>
        <!-- Boucle pour afficher les informations des utilisateurs -->
        <?php foreach ($utilisateurs as $utilisateur) { ?>
            <tr>
                <td><?php echo $utilisateur["login"]; ?></td>
                <td><?php echo $utilisateur["prenom"]; ?></td>
                <td><?php echo $utilisateur["nom"]; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

