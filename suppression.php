<?php
$bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root');
$request = $bdd ->prepare("DELETE FROM fiche_film WHERE id = ':id'");
$request -> execute(['id' => $data['id']]) ;
header("location:filmall.php");
?>