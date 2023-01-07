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
    <title>Accueil</title>
</head>
<body>
    <?php require_once'./ressources/navbar.php'?>

      <!--Search-->
      <input type="text" placeholder="TEST search" id="search"  >

<div class="container-box flex">
    
    <div class="flex flex-col p-6 pt-[50px] gap-6">

        <div class="font-bold">
            Filtre Option
        </div>
    
        <button class="h-[40px] w-[110px] pl-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown">Genre<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

        <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
            <ul id=container_genre class="py-1 flex flex-col" aria-labelledby="dropdown">
            </ul>
        </div>
    </div>

    <div class="flex flex-col pt-[50px]">
        <div class="font-bold text-center text-xl">
            FILM
        </div>

        <div id="container_film" class="flex flex-wrap m-10 justify-center gap-4 z-20">

        </div>
    </div>

</div>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="JS/queryapi.js"></script>
<script src="JS/search.js"></script>
</body>
</html>