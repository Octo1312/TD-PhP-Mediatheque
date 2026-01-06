<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
    <form action="filmmaker.php" method="POST">
        <label for="title">Titre du film :</label>
        <input type="text" name="titre">
        <label for="realisator">Réalisateur :</label>
        <input type="text" name="realisateur">
        <label for="type">Genre du film :</label>
        <input type="text" name="genre">
        <label for="duree">Temps du film :</label>
        <input type="text" name="duree">
        <label for="syno">Synopsis :</label>
        <input type="text" name="synopsis">
        <input type="submit" name="" id="">
    </form>

    <?php 
    $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root');
    If (isset($_POST["titre"]) && $_POST["realisateur"] && ($_POST["genre"]) && ($_POST["duree"]) && ($_POST["synopsis"])) {
    $titre = $_POST["titre"];
    $realisateur = $_POST["realisateur"];
    $genre = $_POST["genre"];
    $duree = $_POST["duree"];
    $synopsis = $_POST["synopsis"];

    $request_insert = $bdd->prepare('INSERT INTO fiche_film(titre, realisateur, genre, duree, synopsis) VALUES(?,?,?,?,?)');
    $request_insert->execute(array($titre, $realisateur, $genre, $duree, $synopsis));
    }
    ?>
    </main>
</body>
</html>