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
    <title>Document</title>
</head>
<body>
<?php require_once'./ressources/navbar.php'?>

<?php $connection = new Connection();
$utilisateurs = $connection->getAllUtilisateur();
?>

<?php foreach($utilisateurs as $utilisateur) { ?>
    <div class="">
        <div class="">
            <h3><?= $utilisateur['first_name'] . ' ' .$utilisateur['last_name']?></h3>
            <br>
        </div>
        <div>
            <a href="profiluser.php?email=<?php echo $utilisateur['email']?>">Voir le compte</a>
        </div>
    </div>
<?php } ?>


</body>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="JS/queryapi.js"></script>
</html>