<?php

class
utils{

    public static function notconnected() {
        return empty($_SESSION['email']);
    }
}



?>