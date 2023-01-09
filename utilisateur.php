<?php session_start();
require_once './ressources/user.php';
require_once './ressources/connection.php';
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
    <title>Document</title>
</head>
<body class="bg-gray-100 h-screen">
    <?php require_once'./ressources/navbar.php'?>

    <div class="container mx-auto p-4  flex flex-wrap ">
        <?php $connection = new Connection();
            $utilisateurs = $connection->getAllUtilisateur();  
        ?>

        <?php foreach($utilisateurs as $utilisateur) { ?>

            <div class="flex flex-col m-4 h-[120px] w-[120px] bg-white p-4 rounded-md shadow-md w-1/4">
    <div class="text-2xl font-bold pb-4">
        <h3><?= $utilisateur['first_name'] . ' ' .$utilisateur['last_name']?></h3>
    </div>
    <div class="pb-4">
        <a href="profiluser.php?email=<?php echo $utilisateur['email']?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm w-28 px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">Voir le compte</a>
    </div>
</div>
<?php } ?>
</div>
</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
</html>

           
