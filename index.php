<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mediathèque</title>
</head>
<body>
    <a href="filmall.php">Film all</a>
    <br>
    <a href="filmmaker.php">Film maker</a>
    <br>
    <a href="register.php">Register</a>
    <br>

    <?php 
    $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root');

    // $request_read = $bdd->prepare('SELECT prenom, nom FROM user');
    // $request_read->execute([]);

    // while($data = $request_read->fetch()) {
    //     echo ''.$data['prenom'].'   '.$data['nom'] . '<br>';
    // }
    ?>

    <!-- <form action="index.php" method="POST">
        <label for="name">Votre nom est :</label>
        <input type="text" name="nom">
        <label for="prenom">Votre prénom est :</label>
        <input type="text" name="prenom">
        <input type="submit">
    </form> -->
    
    <?php 
    /*
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $request_insert = $bdd->prepare('INSERT INTO user(nom,prenom) VALUES (?,?)');
    $request_insert->execute(array($nom, $prenom));
    */
    ?>
    
    <a href="filmmaker.php">Ajouter une fiche de film</a>
    <br>

    <?php 
    $request_read_film = $bdd->prepare('SELECT titre, realisateur, genre, duree FROM fiche_film LIMIT 3');
    $request_read_film->execute([]);

    while($data = $request_read_film->fetch()) {
        echo 'Titre :' .$data['titre'] . '<br>' . 'Produit par :' .$data['realisateur'] .'<br>' . 'Genre :' .$data['genre'] .'<br>' . 'Durée du film :' .$data['duree'] . ' min' . '<br>' . '<br>';
    }
    ?>

</body>
</html>