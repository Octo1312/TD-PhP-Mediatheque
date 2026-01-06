<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mediathèque</title>
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

    <a href="register.php">Register</a>
    <br>


    <a href="filmmaker.php">Ajouter une fiche de film</a>
    <br>
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root');
    $request_read_film = $bdd->prepare('SELECT titre, realisateur, genre, duree FROM fiche_film LIMIT 3');
    $request_read_film->execute([]);
    while ($data = $request_read_film->fetch()) {
        echo
            "<div class=\"card\">
                <div class=\"card_img\">
                </div>
                <div class=\"card_content\">
                    <p>{$data['titre']}</p>
                    <p>{$data['realisateur']}</p>
                    <p>{$data['genre']}</p>
                    <p>{$data['duree']}</p>
                </div>
            </div>";
        }
        ?>
</body>

</html>