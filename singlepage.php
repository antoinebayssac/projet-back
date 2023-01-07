<?php session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php';
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
    <title>Single Page</title>
</head>
<body>

<?php require_once'./ressources/navbar.php'?>

<div class ="container_namemovie p-2">

</div>

<div class="container_singlemovie flex flex-row-reverse items-center">

</div>


<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
<script src="JS/search.js.js"></script>


<script type="text/javascript">

    let container_single = document.querySelector(".container_singlemovie")
    let container_name = document.querySelector(".container_namemovie")

    fetch("https://api.themoviedb.org/3/movie/" + <?php echo $_GET["id"]?> + "?api_key=" + apikey + "&language=fr-FR")
        .then(response => response.json())
        .then(movie => {
            console.log(movie)
            let card = document.createElement("div")
            card.classList = "w-1/2 flex justify-center h-auto p-8 drop-shadow-xl"
            let name = document.createElement("div")

            let info = document.createElement("div")
            info.classList = "w-1/2 flex justify-center flex-col bg-gray-200 h-[300px] m-10 p-4 drop-shadow-xl rounded-md"
            container_single.appendChild(info)
            container_single.appendChild(card)
            container_name.appendChild(name)
            let img = document.createElement("img")
            img.classList = "w-80 min-w-40 h-auto rounded-md"
            img.src="https://image.tmdb.org/t/p/w500" + movie["poster_path"]
            let title = document.createElement("h1")
            title.innerHTML = movie['title']
            title.classList = "font-bold text-3xl text-center"
            let lang = document.createElement("h2")
            lang.innerHTML = "Langue : " + movie["original_language"]
            lang.classList = "font-bold"
            let desc = document.createElement("p")
            desc.innerHTML = "Description : " + movie["overview"]
            desc.classList = "font-bold"
            let date = document.createElement("p")
            date.innerHTML = "Date : " + movie["release_date"]
            date.classList = "font-bold"
            let page = document.createElement("p")
            page.innerHTML = "Site : " + movie["homepage"]
            page.classList = "font-bold" 
            let genre = document.createElement("h3")
            genre.innerHTML = "Genre : " + movie["genre"]
            genre.classList = "font-bold"
            card.appendChild(img)
            name.appendChild(title)
            info.appendChild(genre)
            info.appendChild(date)
            info.appendChild(lang)
            info.appendChild(page)
            info.appendChild(desc)
        }) 
</script>   
</body>
</html>