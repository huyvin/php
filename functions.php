<?php


session_start();

$link = mysqli_connect('localhost', 'admin', 'root', 'twitter');

    if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }

    if (isset($_GET['function']) && $_GET['function'] == "logout") {
        
        session_unset();
        
    }

?>