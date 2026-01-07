<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Créateur de fiche film</title>
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
                if (!isset($_SESSION["username"])) {
                    echo "<li><a href=\"register.php\">S'inscrire ici</a></li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<li><a href=\"login.php\">Connexion</a></li>";
                }
                if (isset($_SESSION["username"])) {
                    echo "<li><a href=\"deconnexion.php?address=index.php\">Se déconnecter</a></li>";
                } ?>
            </ul>
        </nav>
    </header>
    <main>
        <form action="filmmaker.php" method="POST" enctype="multipart/form-data">
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
            <input type="file" name="img" accept="image/*" id="">
            <input type="submit" name="" id="">
        </form>

        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root');
        if (isset($_POST["titre"]) && $_POST["realisateur"] && ($_POST["genre"]) && ($_POST["duree"]) && ($_POST["synopsis"])) {
            $titre = $_POST["titre"];
            $realisateur = $_POST["realisateur"];
            $genre = $_POST["genre"];
            $duree = $_POST["duree"];
            $synopsis = $_POST["synopsis"];
            $tmpName = $_FILES['img']['tmp_name'];
            $originalName = $_FILES['img']['name'];
            $imageInfo = getimagesize($tmpName);

            $resultUserId = $bdd->prepare('SELECT id FROM user WHERE id = :id');
            $resultUserId->execute(['id' => $_SESSION['id']]);

            $userId = $resultUserId->fetch();
            var_dump($userId);

            if ($imageInfo !== false) {

                $extension = pathinfo($originalName, PATHINFO_EXTENSION);

                $newName = uniqid("img_", true) . "." . $extension;

                $destination = "assets/img/" . $newName;

                move_uploaded_file($tmpName, $destination);

            } else {
                $destination = "";
            }
            $adding = $bdd->prepare('INSERT INTO fiche_film (titre, realisateur, genre, duree, synopsis, img_path, userid) 
                                                VALUES (:titre, :realisateur, :genre, :duree, :synopsis, :imgpath, :userid)');
            $adding->execute([
                'titre' => $titre,
                'realisateur' => $realisateur,
                'genre' => $genre,
                'duree' => $duree,
                'synopsis' => $synopsis,
                'imgpath' => $destination,
                'userid' => $userId['id']
            ]);
        }
        ?>
    </main>
</body>

</html>