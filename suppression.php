<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root');
$request = $bdd ->prepare("SELECT * FROM fiche_film WHERE id = :id");
$request -> execute(['id' => $_GET['id']]);
while($fiche_film = $request ->fetch()) {
    if ($fiche_film['userid'] == $_SESSION['id']) {
    $request_delete = $bdd->prepare('DELETE FROM fiche_film WHERE id = :id');
    $request_delete -> execute(['id'=> $_GET['id']]);
    header('location:filmall.php');
};
}
    echo "<p>Vous n'avez pas les droits</p>";
?>