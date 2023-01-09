<?php
session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php'; 
require_once 'ressources/profil.php';
require_once './ressources/utils.php';


if(utils::notconnected()){
    header("Location: /login.php");
}

$connection = new Connection();
$AllAlbums = $connection->getAlbumFromEmail($_SESSION['email']);

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

    <div class="flex flex-row">
        <div class="w-1/2 flex flex-col items-center">
            <h2>Bienvenue <?php echo $_SESSION['first_name']?></h2>

            <h2>Mes Albums :</h2>

            <?php foreach($AllAlbums as $album) {
                if ($_SESSION['email']==$album['email']){ ?>
                    <div class="">
                        <a href="singlealbum.php?id=<?=$album['id']?>"><?=$album['nom']?></a>
                        <p><?= $album['prive']?></p>
                        <form method="POST" action="profil.php">
                            <input type="hidden" name="delete_album" value="<?= $album["id"]; ?>">
                            <input type="submit" name="deleteAlbum" value="supprimer">
                        </form>
                        <br>
                    </div>
                <?php }?>
            <?php }?>
        </div>

        <div class="w-1/2 flex justify-center pt-5">
            <form method=POST>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="age" id="age" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="age" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Age</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                    </div>
                </div>
                <button type="submit" name="add" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
            </form>

            <?php 
            if (isset($_POST['age']) && isset($_POST['description'])) {
                $age = $_POST['age'];
                $description = $_POST['description'];
                $email = $_SESSION['email'];  
              
                $connection = new Connection();
              
                $stmt = $connection->pdo->prepare('UPDATE user SET age = :age, description = :description WHERE email = :email');
                $stmt->bindValue(':age', $age, PDO::PARAM_INT);
                $stmt->bindValue(':description', $description, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
              
                
                if ($stmt->execute()) {
                  
                } else {
                }
              }
             
            ?>
        </div>
    </div>
</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
</html>