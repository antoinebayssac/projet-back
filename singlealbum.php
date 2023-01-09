<?php
session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php'; 
require_once 'ressources/profil.php';
require_once 'ressources/utils.php';


if(utils::notconnected()){
    header("Location: /login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<?php

if($_GET && isset($_GET['id'])){
    $id = $_GET['id'];
    
    //faire une connexion à la db
    $db = new Connection();
    $query = $db->PDO->prepare("SELECT * FROM films WHERE album_id = :album_id");
    $query->execute(['album_id' => $id]);
    $allMovies = $query->fetchAll();
    
    foreach($allMovies as $movie){
        if ($album['prive'] == 0 ){ ?>
            <div class="">
                <div class="">
                    <p><?=$album['nom']?></p>
                    <a href="singlealbum.php?id=<?=($album['album_id'])?>">Voir l'album</a>
                    <br>
                </div>
            </div>
        <script>
            fetch("https://api.themoviedb.org/3/search/movie/<?=$movie['film_id']?>").then(data => data.json())
                .then(data => {
                    //tu fais tes trucs genre afficher titre et lien vers page de film
                })
        </script>
    }
<?php
    else {
    //rediriger ou faire un truc, mais en gros la page doit pas s'afficher
} ?>

<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
</body>

</html>