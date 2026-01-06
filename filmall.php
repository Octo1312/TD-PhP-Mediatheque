<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>All film</title>
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
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root');
        $request_read_film = $bdd->prepare('SELECT titre, realisateur, genre, duree FROM fiche_film');
        $request_read_film->execute([]);

        while ($data = $request_read_film->fetch()) {
        echo 'Titre :' . $data['titre'] . '<br>' . 'Produit par :' . $data['realisateur'] . '<br>' . 'Genre :' . $data['genre'] . '<br>' . 'Durée du film :' . $data['duree'] . ' min' . '<br>' . '<br>';
        }
        ?>
    </main>
</body>

</html>