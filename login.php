<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>

<body>
    <h1>Se connecter</h1>
    <form action="login.php" method="POST">
        <label for="user">Username : </label>
        <input type="text" name="username">
        <br>
        <label for="password">Password : </label>
        <input type="text" name="mdp">
        <br>
        <input type="submit" name="send">
    </form>

    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root', '');

    if (isset($_POST['username'], $_POST['mdp'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['mdp'];

        $requestFind = $bdd->query('SELECT id, nom, prenom, mdp, username FROM user');
        while ($data = $requestFind->fetch()) {
            if ($data['username'] == $username && password_verify($password, $data['mdp'])) {
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                header("location:index.php");
                exit;
            } else {
                echo "Erreur de connexion";
            }
        }
    }
    ?>
</body>
</html>