<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <?php if (isset($_SESSION['username'])) {
                    echo "<li>Bonjour {$_SESSION['username']}</li>";
                } ?>
                <li><a href="index.php">Accueil</a></li>
                <?php if (isset($_SESSION['username'])) {
                    echo "<li><a href=\"filmmaker.php\">Ajouter un film</a></li>";
                }
                ; ?>
                <li><a href="filmall.php">Les films</a></li>
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li><a href=\"login.php\">Connexion</a></li>";
                }/* else {
                echo "<li><a href=\"deconnexion.php?address=connexion.php\">Déconnexion</a></li>";
            }*/ ?>
            </ul>
        </nav>
    </header>
    <main>
        <form action="register.php" method="post">
            <label for="username">Username :</label>
            <input type="text" name="user">
            <label for="password">Password :</label>
            <input type="text" name="password">
            <label for="name">Votre nom est :</label>
            <input type="text" name="nom">
            <label for="prenom">Votre prénom est :</label>
            <input type="text" name="prenom">
            <input type="submit" name="send">
        </form>

        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root', '');
        if (isset($_POST["user"]) && $_POST["password"] && ($_POST["nom"]) && ($_POST["prenom"])) {
            $username = $_POST["user"];
            $password = password_hash(($_POST["password"]), PASSWORD_ARGON2I);
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];

            $request_insert = $bdd->prepare('INSERT INTO user(nom, prenom, mdp, username) VALUES(?,?,?,?)');
            $request_insert->execute(array($nom, $prenom, $password, $username));
        }
        ?>
    </main>
</body>

</html>