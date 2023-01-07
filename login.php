<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build.css">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>




    <section class="bg-neutral-800">

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <nav class="  px-2 sm:px-4 py-2.5">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <a href="index.php" class="flex items-center">
                    <img src="IMG/WEEK'S%20FiLMS.png" class="h-6 mr-3 sm:h-9" alt="Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Week's Films</span>
                </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0  dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-blue-900 md:text-2xl ">
                    Connexion
                </h1>
                <form class="space-y-4 md:space-y-6" method="POST">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-blue-700 ">Votre email</label>
                        <input type="email" name="email" id="email" class="bg-blue-700 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                    </div>


                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-blue-700 ">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-blue-700 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-blue-500 dark:text-blue-300">Se Souvenir de moi</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Mot de passe oublié ?</a>
                    </div>
                    <button type="submit" class="w-full text-blue-500 bg-primary-600 border-solid border-black hover:bg-primary-700 focus:ring-4  focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Se Connecter</button>
                    <p class="text-sm font-light text-gray-500 dark:text-blue-400">
                        Vous n'êtes pas inscrit ? <a href="register.php" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Inscription</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    </section>
    
<?php
session_start();
require_once 'ressources/user.php';
require_once 'ressources/connection.php';

if ($_POST) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
        $connection = new Connection();
        $result = $connection->connect($email, $password);

        if ($result) {
            echo '<p>Connexion avec succès !</p>';
            header("Location: index.php");
            } else {
                header('Location: login.php');
            }
        }
        else{
            echo 'password invalid';
        }
    } else {

        echo '<p> Please enter an email and a valid password !</p>';
    }
?>
</body>
</html>