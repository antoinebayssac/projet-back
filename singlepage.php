<?php session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Single Page</title>
</head>
<body>

<?php require_once'./ressources/navbar.php'?>

<div class="container_singlemovie">

</div>



<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>

<script type="text/javascript">

    let container_single = document.querySelector(".container_singlemovie")

    fetch("https://api.themoviedb.org/3/movie/" + <?php echo $_GET["id"]?> + "?api_key=" + apikey + "&language=fr-FR")
        .then(response => response.json())
        .then(movie => {
            console.log(movie)
            let card = document.createElement("div")
            card.classList = "flex"
            container_single.appendChild(card)
            let img = document.createElement("img")
            img.src="https://image.tmdb.org/t/p/w500" + movie["poster_path"]
            let title = document.createElement("h1")
            title.innerHTML = movie["title"]
            card.appendChild(img)
            card.appendChild(title)
            
            

        }) 
</script>   
</body>
</html>