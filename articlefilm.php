<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Article film</title>
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
        <div class="container">
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root');

            $request = $bdd->prepare('SELECT id, titre, realisateur, genre, duree, synopsis FROM fiche_film WHERE id = :id');

            $request->execute(['id' => $_GET['id']]);

            while ($data = $request->fetch()) {
                echo
                    "<div>
                    <p>{$data['titre']}</p>
                    <p>{$data['realisateur']}</p>
                    <p>{$data['genre']}</p>
                    <p>{$data['duree']}</p>
                    <p>{$data['synopsis']}</p>
                </div>";
            }
            ?>
        </div>
    </main>
</body>

</html>