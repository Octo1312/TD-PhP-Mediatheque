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
                if (!isset($_SESSION['username'])) {
                    echo "<li><a href=\"login.php\">Connexion</a></li>";
                }
                ?>
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

                while ($data = $request->fetch()) {
                    $dureeEnHeure = date("G\h i\m\i\\n", mktime(0, $data['duree'], 0, 0, 0, 0));

                    if ($data['img_path'] == "") {
                        echo
                            "<div class=\"card\">
                            <div class=\"card__content\"> 
                                <p>{$data['titre']}</p>
                                <p>{$data['realisateur']}</p>
                                <p>{$data['genre']}</p>
                                <p>{$dureeEnHeure}</p>
                                <a href=\"fichefilm.php?id={$data['id']}\">Voir plus</a>
                            </div>
                        </div>";
                    } else {
                        echo
                            "<div class=\"card\">
                            <div class=\"card__img\">
                                <img src=\"{$data['img_path']}\" alt=\"Image du film\">
                            </div>                 
                            <div class=\"card__content\"> 
                                <p>Titre : {$data['titre']}</p>
                                <p>Réalisateur : {$data['realisateur']}</p>
                                <p>Genre : {$data['genre']}</p>
                                <p>Durée : {$dureeEnHeure}</p>
                                <a href=\"fichefilm.php?id={$data['id']}\">Voir plus</a>
                            </div>
                        </div>";
                    }
                }
                ?>
            </div>
        </div>
    </main>
</body>

</html>