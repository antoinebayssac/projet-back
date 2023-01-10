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

    <div class="font-black text-center text-3xl p-3">
            <h2>Album</h2>
    </div>

    <div class="flex flex-wrap flex-row justify-center">
        <?php
            foreach($allMovies as $movie){
                if ($movie['film_id']){ ?>
                    <div class="flex ">
                            <div class="container_f flex p-4 gap-4 " >
                            </div>
                    </div>
                <script>
                    fetch("https://api.themoviedb.org/3/movie/<?=$movie['film_id']?>?api_key=b8442a4865b3123e0303b772a7a80077").then(data => data.json())
                        .then(data => {
                            console.log(data)
                            let c = document.createElement("div")
                            let title = document.createElement("h2")
                            let img = document.createElement('img')
                            let link = document.createElement("a")
                            let deleteButton = document.createElement("a")
                            let divButton = document.createElement("div")

                            c.classList = "flex flex-col text-center justify-content align-items "

                            let cont = document.querySelector(".container_f")
                             cont.appendChild(c)

                            title.innerHTML = data["title"]
                            title.classList = "flex text-center justify-content align-items font-bold m-0.5"
                            c.appendChild(title)

                            img.src = "https://image.tmdb.org/t/p/w500" + data["poster_path"]
                            c.classList = "w-[300px] h-[400px] object-cover mb-5 flex flex-wrap"

                            c.appendChild(img)

                            divButton.classList = "w-[300px] h-[50px] object-cover flex justify-center"
                            c.appendChild(divButton)

                            link.href = "singlepage.php?id=<?=($movie['film_id'])?>"
                            link.innerHTML = "Voir le film"
                            link.classList = "text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-xs w-28 px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 m-1.5"
                            divButton.appendChild(link)

                            deleteButton.innerHTML = "Supprimer le film"
                            deleteButton.classList = "text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-xs w-28 px-5  text-center dark:bg-blue-600 dark:hover:bg-blue-700 m-1.5"

                            deleteButton.href = "delete.php?id=" + <?=$movie['film_id']?>;
                            divButton.appendChild(deleteButton)
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