<?php session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php';
require_once './ressources/utils.php';

if(utils::notconnected()){
    header("Location: /login.php");
}

if (isset($_POST)){
    if(!empty($_POST["nom"])){
        $connection = new Connection();
        $result = $connection->insertalbum($_SESSION["email"], $_POST["nom"], isset($_POST['private']) ? 1 : 0);

        if ($result) {
            header("Location: album.php");
            
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

<form method="POST">
    <div class="flex flex-col w-1/2 h-[300px] justify-center items-center p-4">
        <div class="font-bold">
            <h1>Ajoutez des Albums</h1>
        </div>
        <div class="mb-6">
            <label for="base-input" class=" w-[100px] block mb-2 text-sm font-medium text-gray-900 dark:text-white">Base input</label>
            <input name="nom" type="text" id="base-input" class="bg-gray-50 border border-white-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-700 dark:border-blue-600 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nom de l'album">
        </div>

        <label class="relative inline-flex items-center mb-4 cursor-pointer">
            <input name="private" type="checkbox" value="true" class="sr-only peer" checked>
            <div class="w-11 h-6 bg-green-800 rounded-full dark:bg-gray-400 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
            <span class="ml-3 text-sm font-medium dark:text-blue-800">Privé</span>
        </label>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">Ajouter</button>
    </div>
</form>

</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
</html>