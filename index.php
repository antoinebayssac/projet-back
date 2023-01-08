<?php session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php';
require_once './ressources/utils.php';


;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="build.css">
    <title>Accueil</title>
</head>
<body>
<?php require_once'./ressources/navbar.php'?>
<Button onclick="toggleLikeButton()" id="container_likeButton" class="btn bg-red-500"><i class="fas fa-heart"></i></Button>

<div class="container-box flex bg-red-500">
        <div class="flex flex-col p-6 pt-[50px] gap-6">
            <div class="font-bold text-blue-600">
                Filtre Option
            <div class="flex flex-col  pt-[50px] gap-6">
                <!--SearchBar-->
                <input type="text" id="search" class="block h-[40px] w-[110px] p-2  text-blue-600  border border-solid border-7 border-blue-700 rounded-lg bg-white " placeholder="Search...">
                <!--Popularity-->
                <button id="container_popularity" class="h-[40px] w-[110px] pl-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" >Popularity</button>
                <!--Reviews-->
                <button id="container_top_rates" class="h-[40px] w-[110px] pl-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" >Top Rated</button>
                <!--Genres-->
                <button class="h-[40px] w-[110px] pl-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown">Genre<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>                <!--Dropdown Menu-->
                <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                    <ul id=container_genre class="py-1 flex flex-col" aria-labelledby="dropdown">
                    </ul>
                </div>
            </div>
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
    </div>

</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="JS/queryapi.js"></script>
</html>