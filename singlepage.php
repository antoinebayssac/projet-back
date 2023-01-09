<?php session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php';
require_once './ressources/utils.php';

if(utils::notconnected()){
    header("Location: /login.php");
}

$connection = new Connection();
$AllAlbums = $connection->getAlbumFromEmail($_SESSION['email']);

if(isset($_POST["submit"])){
    if(!empty($_POST["addfilms"])){
        if($connection->AddFilmToAlbum($_GET["id"],$_POST["addfilms"])){
            echo "a";
            
        } else {
            echo "b";
        }
    }
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Single Page</title>
</head>
<body>

<?php require_once'./ressources/navbar.php'?>

<div class="container mx-auto py-5">
    <div class="flex justify-center">
        <div class="w-3/4">
            <div class="flex flex-col items-center p-5 bg-gray-200 rounded-lg shadow-lg">
                <div class="container_namemovie text-2xl font-bold text-gray-900 mb-5">
                    <!-- Nom du film -->
                </div>
                <div class="container_singlemovie flex flex-row-reverse items-center">
                    <!-- Affichage de l'affiche du film -->
                </div>
                <div class="flex justify-center w-3/4 gap-5 mt-5">
                    <form method="POST" class="w-full max-w-sm">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisissez une option</label>
                        <select id="countries" name="addfilms" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choisissez l'album</option>
                            <?php foreach($AllAlbums as $album) {
                                if ($_SESSION['email']==$album['email']){ ?>
                                    <option value="<?= $album["id"]?>">
                                        <?= $album["nom"]?> <?php if($album["prive"]){
                                            echo " (prive)";
                                        }?>
                                    </option>
                            <?php } ?>
                        <?php } ?>
                        </select>
                        <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter à l'album</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>

<<script type="text/javascript">

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
        info.classList = "w-1/2 flex justify-center flex-col h-[300px] m-10 p-4"
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

