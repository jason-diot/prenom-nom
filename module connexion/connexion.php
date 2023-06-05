<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: profil.php");
    exit;
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $login = $_POST["login"];
    $motDePasse = $_POST["motDePasse"];

       // Vérifier les informations de connexion
       if ($login == "admin" && $motDePasse == "admin") {
        // Authentification réussie
        $_SESSION["loggedin"] = true;
        $_SESSION["login"] = $login;
        
        // Rediriger vers la page de profil
        header("Location: profil.php");
        exit;
    } else {
        echo "Login ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="motDePasse">Mot de passe:</label>
        <input type="password" id="motDePasse" name="motDePasse" required><br>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>

