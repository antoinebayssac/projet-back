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

<div class="container_singlemovie flex flex-row-reverse">

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
            card.classList = "w-1/2 flex justify-center h-auto p-8 drop-shadow-xl"
            let info = document.createElement("div")
            info.classList = "w-1/2 flex justify-center flex-col pr-20"
            container_single.appendChild(info)
            container_single.appendChild(card)
            let img = document.createElement("img")
            img.classList = "w-80 min-w-40 h-auto rounded-md"
            img.src="https://image.tmdb.org/t/p/w500" + movie["poster_path"]
            let title = document.createElement("h1")
            title.innerHTML = movie["title"]
            let lang = document.createElement("h2")
            lang.innerHTML = movie["original_language"]
            let desc = document.createElement("p")
            desc.innerHTML = movie["overview"]
            let date = document.createElement("p")
            date.innerHTML = movie["release_date"]
            let page = document.createElement("p")
            page.innerHTML = movie["homepage"] 
            let genre = document.createElement("h3")
            genre.innerHTML = movie["genre"] 
            card.appendChild(img)
            info.appendChild(title)
            info.appendChild(genre)
            info.appendChild(date)
            info.appendChild(lang)
            info.appendChild(page)
            info.appendChild(desc)
        }) 
</script>   
</body>
</html>