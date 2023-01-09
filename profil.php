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

if (isset($_POST)){
    if(!empty($_POST["nom"])){
        $connection = new Connection();
        $result = $connection->insertalbum($_SESSION["email"], $_POST["nom"], isset($_POST['private']) ? 1 : 0);

        if ($result) {
            echo("<p>Album Ajouter !</p>");
            
        } else {
            echo '<p>Veuillez réessayer</p>';
        }
    }  
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

    <!--   TITRE    -->

    <h2 class="text-2xl font-bold pb-4 flex justify-center item-center pt-5">Bienvenue, <?php echo $_SESSION['first_name']?></h2>


        <div class="w-full flex flex-wrap p-5">
            <!--    AGE & DESCRIPTION    -->
            <form method=POST>
                <div class="flex flex-col  bg-white h-[270px] w-[300px] justify-center rounded-md shadow-md m-5 px-5">
                    <h2 class="font-bold">Infos personnelles</h2>

                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="age" id="age" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="age" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Age</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                    </div>
                    <button type="submit" name="add" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>

                </div>
            </form>
            <!--   AJOUT ALBUMS    -->
            <form method="POST">
                <div class="flex flex-col  bg-white h-[270px] w-[300px] justify-center rounded-md shadow-md m-5 p-5">

                    <div class="font-bold">
                        <h1>Ajoutez des Albums</h1>
                    </div>
                    <div class="mb-6">
                        <label for="base-input" class=" w-[100px] block mb-2 text-sm font-medium text-gray-900 dark:text-white">Base input</label>
                        <input name="nom" type="text" id="base-input" class="bg-gray-50 border border-white-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full sm:w-auto px-5 py-2.5 dark:bg-blue-700 dark:border-blue-600 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nom de l'album">
                    </div>

                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                        <input name="private" type="checkbox" value="true" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-green-800 rounded-full dark:bg-gray-400 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                        <span class="ml-3 text-sm font-medium dark:text-blue-800">Privé</span>
                    </label>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  w-28 px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
                </div>
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

            <div class="bg-white h-full w-[300px] justify-center rounded-md shadow-md m-5 p-5 ">
                <h2 class="font-bold">Mes Albums :</h2>

                <div class="flex flex-wrap p-5  justify-center  ">
                    <?php foreach($AllAlbums as $album) {
                        if ($_SESSION['email']==$album['email']){ ?>
                            <div class="flex bg-white h-full w-full justify-center  rounded-md shadow-md m-5 p-5">
                                <form method="POST" action="profil.php" class="flex flex-col justify-center items-center">
                                    <a href="singlealbum.php?id=<?=$album['id']?>"><?=$album['nom']?></a>
                                    <p><?= $album['prive']?></p>
                                    <input type="hidden" name="delete_album" value="<?= $album["id"]; ?>">
                                    <input type="submit" name="deleteAlbum" value="Supprimer" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none  font-medium rounded-lg text-sm w-28 px-5 py-2.5 text-center items-center dark:bg-blue-600 dark:hover:bg-blue-700">
                                </form>
                                <br>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>

        </div>



</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
</html>