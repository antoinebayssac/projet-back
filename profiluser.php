<?php session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php';
require_once './ressources/utils.php';

if(utils::notconnected()){
    header("Location: /login.php");
}

$connection = new Connection();
$AllAlbums = $connection->getAlbumFromEmail($_SESSION['email']);

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

    <h2>Profil de <?php echo $_SESSION['first_name']?></h2>

    <h2>Ses Albums</h2>

    <?php foreach($AllAlbums as $album) {
        if ($album['prive'] == 0 ){ ?>
        <div class="">
            <div class="">
                <p><?=$album['nom']?></p>
                <a href="album.php?id=<?=($album['id'])?>">Voir l'album</a>
                <br>
            </div>
        <?php } ?>
    <?php } ?>
    
</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
</html>