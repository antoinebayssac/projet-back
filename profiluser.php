<?php session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php';
require_once './ressources/utils.php';

$connection = new Connection();

if(utils::notconnected()){
    header("Location: /login.php");
}

if (isset($_GET['email'])) {
    $userEmail = $_GET['email'];
    $oneuser = $connection->getSoloUser($userEmail);
    $found = true;
} else {
    $found = false;
}
$AllAlbums = $connection->getAlbumFromEmail($userEmail);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $albumId = $_POST['album_id'];
    $connection->incrementLikes($albumId);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100 h-screen">
    <?php require_once'./ressources/navbar.php'?>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Profil de <?php echo $oneuser['0']['first_name']?></h2>

        <h2 class="text-xl font-bold mb-4">Ses Albums</h2>
        <div class="flex flex-wrap gap-4">
            <?php foreach($AllAlbums as $album) {
                if ($album['prive'] == 0 ){ ?>
                <div class="bg-white p-4 rounded-md shadow-md w-1/4">
                    <div class="mb-4">
                            <p class="text-lg font-bold"><?=$album['nom']?></p>
                            <a href="singlealbum.php?id=<?=($album['id'])?>" class="text-blue-500 hover:text-blue-600 font-bold">Voir l'album</a>
                    </div>
                    <button onclick="incrementLikes(<?=$album['id']?>)" id="container_likeButton" class="btn "><i class="fas fa-heart"></i> Like</button>

                    <script>  
                    function incrementLikes(albumId) {  
                        fetch("/path/to/server", {
                        method: "POST",
                        body: JSON.stringify({
                            album_id: albumId,
                        }),
                        headers: {
                            "Content-Type": "application/json",
                        },
                        }).then(response => {
                        if (response.ok) {
                            event.target.innerHTML = "Liked!"
                        }
                        })
                    }
                    </script>
                </div>
            <?php } ?>
            <?php } ?>      
        </div>
    </div>
</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
</html>