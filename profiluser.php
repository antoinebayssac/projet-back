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

    <h2>Profil de <?php echo $oneuser['0']['first_name']?></h2>

    <h2>Ses Albums</h2>

    <?php foreach($AllAlbums as $album) {
        if ($album['prive'] == 0 ){ ?>
        <div class="">
            <div class="">
                <p><?=$album['nom']?></p>
                <a href="singlealbum.php?email=<?=($album['email'])?>">Voir l'album</a>
                <br>
            </div>
        <?php } ?>
    <?php } ?>
    
</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
</html>