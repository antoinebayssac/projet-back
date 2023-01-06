<?php
session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php'; 
require_once 'ressources/profil.php';

$connection = new Connection();
$AllAlbums = $connection->getAlbum();

if(isset($_POST["deleteAlbum"])){
    $connection->deleteAlbum($_POST["delete_album"]);
    header('Location: profil.php');
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

    <?php echo $_SESSION['email']?>

    <h2>Mes Albums :</h2>

    <?php foreach($AllAlbums as $album) { ?>
        <div class="together">
            <div class="name_user">
                <h3><?= $album['nom']?></h3>
                <p><?= $album['prive']?></p>
                <form method="POST" action="profil.php">
                    <input type="hidden" name="delete_album" value="<?= $album["id"]; ?>">
                    <input type="submit" name="deleteAlbum" value="supprimer">
                </form>
                <br>
            </div>
    <?php } ?>




    
</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
</html>