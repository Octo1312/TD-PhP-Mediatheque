<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All film</title>
</head>
<body>
    <?php 
    $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root');
    $request_read_film = $bdd->prepare('SELECT titre, realisateur, genre, duree FROM fiche_film');
    $request_read_film->execute([]);

    while($data = $request_read_film->fetch()) {
        echo 'Titre :' .$data['titre'] . '<br>' . 'Produit par :' .$data['realisateur'] .'<br>' . 'Genre :' .$data['genre'] .'<br>' . 'Durée du film :' .$data['duree'] . ' min' . '<br>' . '<br>';
    }
    ?>
</body>
</html>