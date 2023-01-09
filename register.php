<?php
require_once 'ressources/user.php';
require_once 'ressources/connection.php';

if ($_POST) {
    $user = new User(
        $_POST['email'],
        $_POST['password1'],
        $_POST['password2'],
        $_POST['first_name'],
        $_POST['last_name']
    );

    if ($user->verify()) {
        // save to database
        $connection = new Connection();
        $result = $connection->insert($user);

        if ($result) {
            echo '<p>Inscription avec succès !</p>';
            header("Location: login.php");
        } else {
            echo '<p>Erreur interne</p>';
        }
    } else {
        echo '<p>Veuillez remplir correctement le formulaire</p>';
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
    <link rel="stylesheet" href="style.css">

    <title>Inscription</title>
</head>
<body>

<section class="bg-neutral-800">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <nav class=" border-gray-200 px-2 sm:px-4 py-2.5">
            <div class="container flex flex-wrap items-center justify-center mx-auto">
                <a href="index.php" class="flex items-center">
                    <img src="IMG/WEEK'S%20FiLMS.png" class="h-6 mr-3 sm:h-9" alt="Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Week's Films</span>
                </a>
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight  text-blue-900 md:text-2xl ">
                            Inscription
                        </h1>
              <form class="space-y-4 md:space-y-6" method="POST">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-blue-900">Votre email</label>
                      <input type="email" name="email" id="email" class="bg-blue-700 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-blue-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                  </div>
                    <div>
                      <label for="password1" class="block mb-2 text-sm font-medium text-blue-900">mot de passe</label>
                      <input type="password" name="password1" id="password1" placeholder="••••••••" class="bg-blue-700 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-blue-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>

                  <div>
                      <label for="password2" class="block mb-2 text-sm font-medium text-blue-900">Confirmez votre mot de passe</label>
                      <input type="password" name="password2" id="password2" placeholder="••••••••" class="bg-blue-700 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-blue-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                    <div>
                      <label for="first_name" class="block mb-2 text-sm font-medium text-blue-900">Prénom</label>
                      <input type="text" name="first_name" id="first_name" placeholder="Votre Prénom" class="bg-blue-700 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-blue-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>

                    <div>
                      <label for="last_name" class="block mb-2 text-sm font-medium text-blue-900">Nom</label>
                      <input type="text" name="last_name" id="last_name" placeholder="Votre Nom" class="bg-blue-700 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-blue-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                  <button type="submit" class="w-full text-blue-900 bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Inscription</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Vous avez deja un compte ? <a href="login.php" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Connectez-vous ici</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>  
</body>
</html>