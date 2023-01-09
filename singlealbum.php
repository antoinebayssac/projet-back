<?php
session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php'; 
require_once 'ressources/profil.php';
require_once './ressources/utils.php';


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

<?php require_once'./ressources/navbar.php'?>

<?php

if($_GET && isset($_GET['id'])){
    $id = $_GET['id'];
    
    //faire une connexion à la db
    $db = new Connection();
    $allMovies = $db->getFilmbyID($id);?>
    
    <div class="flex flex-wrap flex-row justify-center">
        <?php
            foreach($allMovies as $movie){
                if ($movie['film_id']){ ?>
                    <div class="flex">
                            <div class="container_f flex p-4 gap-4">
                            
                            </div>
                    </div>
                <script>
                    fetch("https://api.themoviedb.org/3/movie/<?=$movie['film_id']?>?api_key=b8442a4865b3123e0303b772a7a80077").then(data => data.json())
                        .then(data => {
                            console.log(data)
                            let c = document.createElement("div")
                            let img = document.createElement('img')
                            let link = document.createElement("a")

                            c.classList = "flex flex-col text-center"

                            let cont = document.querySelector(".container_f")
                             cont.appendChild(c)

                            img.src = "https://image.tmdb.org/t/p/w500" + data["poster_path"]
                            c.appendChild(img)

                            link.href = "singlepage.php?id=<?=($movie['film_id'])?>"
                            link.innerHTML = "Voir le film"

                            c.appendChild(link)
                        })
                </script>
            <?php 
                } else {
                //rediriger ou faire un truc, mais en gros la page doit pas s'afficher
            }
        }}
        ?> 
    </div>  

</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
</html>