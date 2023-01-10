<?php

if (isset($_GET['id'])) {
    require_once 'ressources/connection.php';

    $connection = new Connection();
    $connection->deleteFilmsByAlbumId($_GET['id']);

    // redirect to users.php url
    header('Location: singlealbum.php');
}
