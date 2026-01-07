<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
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
                if (!isset($_SESSION["username"])) {
                    echo "<li><a href=\"register.php\">S'inscrire ici</a></li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<li><a href=\"login.php\">Connexion</a></li>";
                }
                if (isset($_SESSION["username"])) {
                    echo "<li><a href=\"deconnexion.php?address=filmall.php\">Se déconnecter</a></li>";
                } ?>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h2>Les derniers films ajoutés :</h2>
            <div class="card_container">
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root');

                $request = $bdd->query('SELECT id, titre, realisateur, genre, duree, img_path FROM fiche_film');

                while ($data = $request->fetch()):
                    $dureeEnHeure = date("G\h i\m\i\\n", mktime(0, $data['duree'], 0, 0, 0, 0));
                    ?>
                    <div class="card">
                        <?php if ($data['img_path'] != ""): ?>
                            <div class="card__img">
                                <img src="<?= $data['img_path'] ?>" alt="Image du film">
                            </div>
                        <?php endif ?>
                        <div class="card__content">
                            <p>Titre : <?= $data['titre'] ?></p>
                            <p>Réalisateur : <?= $data['realisateur'] ?></p>
                            <p>Genre : <?= $data['genre'] ?></p>
                            <p>Durée : <?= $dureeEnHeure ?></p>
                            <a href="articlefilm.php?id<?= $data['id'] ?>">Voir plus</a>
                            <?php if (isset($_SESSION["username"])): ?>
                            <a href="modification.php?id<?=$data['id']?>">Modifier</a>
                            <a href="suppression.php?id<?=$data['id']?>">Supprimer</a>
                            <?php endif ?>
                        </div>
                    </div>
                    <?php
                endwhile;
                ?>
            </div>
        </div>
    </main>
</body>

</html>