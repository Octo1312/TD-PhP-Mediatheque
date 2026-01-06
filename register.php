<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form action="index.php" method="post">
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
    $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root');
    If (isset($_POST["username "]) && $_POST["password"] && ($_POST["nom"]) && ($_POST["prenom"])) {
    $username = $_POST["username"];
    $password = password_hash(($_POST["password"]), PASSWORD_ARGON2I);
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];

    $request_insert = $bdd->prepare('INSERT INTO user(username, password, nom, prenom) VALUES(?,?,?,?)');
    $request_insert->execute(array($username, $password, $nom, $prenom));
    }
    ?>
</body>
</html>