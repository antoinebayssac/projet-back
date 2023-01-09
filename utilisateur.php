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

    <div class="container mx-auto p-4">
        <?php $connection = new Connection();
            $utilisateurs = $connection->getAllUtilisateur();  
        ?>

        <?php foreach($utilisateurs as $utilisateur) { ?>

            <div class="flex flex-col items-center mb-4">
    <div class="text-2xl font-bold mb-2">
        <h3><?= $utilisateur['first_name'] . ' ' .$utilisateur['last_name']?></h3>
    </div>
    <div class="bg-blue-500 text-white font-bold py-2 px-4 rounded-full">
        <a href="profiluser.php?email=<?php echo $utilisateur['email']?>" class="text-white hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300">Voir le compte</a>
    </div>
</div>
<?php } ?>
</div>
</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="JS/queryapi.js"></script>
</html>

           
